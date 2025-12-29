(function ($) {
	$.fn.remAddRow = function (options) {
		const settings = $.extend({
			addBtn: null,                 // selector for add button (required)
			maxFields: 10,                // maximum visible rows
			removeSelector: ".row_remove",// selector used inside the rowTemplate for the remove button
			fieldName: "rows",            // used to reindex input names like fieldName[index]
			rowIdPrefix: "row",           // prefix used for each row id (row_0, row_1 ...)
			reindexOnRemove: true,        // whether to reindex names/data-id after remove
			// default template: uses removeSelector (converted to class) and fieldName
			rowTemplate: (i, name) => {
				const removeClass = (".row_remove".replace(/^\./, "")); // default removeSelector class
				return `
				<div class="row-box" id="row_${i}">
					<span data-row-index>Row #${i+1}</span>
					<input type="text" name="${name}[${i}]" />
					<button type="button" class="${removeClass}" data-id="${i}">Remove</button>
				</div>
				`;
			},
			startCounter: 0,
			onAdd: (i, $row) => {},
			onRemove: (i, e) => {}
		}, options);

		const $wrapper = this;
		const $addBtn = $(settings.addBtn);

		// escape a string for safe use in a RegExp
		function escapeRegex(s) {
			return s.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
		}

		// regex to detect names beginning with `fieldName[<number>]`
		const namePrefixRegex = new RegExp('^' + escapeRegex(settings.fieldName) + '\\[\\d+\\]');

		// reindex rows so indexes in names and data-id become 0..n-1
		function reindexRows() {
			$wrapper.children().each(function (i) {
				const $row = $(this);

				// set new id like prefix_i
				$row.attr('id', `${settings.rowIdPrefix}_${i}`);

				// update any visible "index" elements if present
				$row.find('[data-row-index]').each(function () {
					$(this).text($(this).data('row-index-offset') ? $(this).data('row-index-offset') + i : i + 1);
				});

				// rename inputs/selects/textareas that start with fieldName[...] => fieldName[i]...
				$row.find('input[name], select[name], textarea[name]').each(function () {
					const name = $(this).attr('name');
					if (!name) return;
					const newName = name.replace(namePrefixRegex, `${settings.fieldName}[${i}]`);
					$(this).attr('name', newName);
				});

				// update remove button data-id(s)
				$row.find(settings.removeSelector).attr('data-id', i);
			});
		}

			// update add button enabled state using actual current count
		function updateAddBtnState() {
			if (!$addBtn.length) return;
			const currentCount = $wrapper.children().length;
			$addBtn.prop('disabled', currentCount >= settings.maxFields);
		}

			// initialize: ensure pre-existing rows are reindexed (if any)
		if (settings.reindexOnRemove) reindexRows();
		updateAddBtnState();

		// ADD handler: base next index on current number of children (keeps indices contiguous)
		$addBtn.on('click', function () {
			const currentCount = $wrapper.children().length;
			if (currentCount >= settings.maxFields) return;
			const index = currentCount; // next index
			const $row = $(settings.rowTemplate(index, settings.fieldName));
			$wrapper.append($row);
			// If rowTemplate didn't embed the correct data-id or names, we reindex to be safe
			if (settings.reindexOnRemove) reindexRows();
			settings.onAdd(index, $row);
			updateAddBtnState();
		});

		// REMOVE (delegated). We find the nearest child-of-wrapper ancestor to remove.
		$wrapper.on('click', settings.removeSelector, function (e) {
			e.preventDefault();
			const clicked = $(this);
			const id = clicked.data('id');

			// prefer closest ancestor whose id ends with _<id>
			let $target = clicked.closest(`[id$="_${id}"]`);

			// fallback: find first ancestor whose parent is wrapper (i.e., direct child of wrapper)
			if (!$target.length) {
				$target = clicked.parents().filter(function () {
					return $(this).parent().is($wrapper);
				}).first();
			}

			// final fallback: closest .row-box
			if (!$target.length) $target = clicked.closest('.row-box');

			if ($target.length) {
				settings.onRemove?.(id, e, $target, settings.fieldName);   // run callback first

				// only remove if callback does NOT cancel it
				if (!e.isDefaultPrevented()) {
					$target.remove();
					if (settings.reindexOnRemove) reindexRows();
				}
				updateAddBtnState();
			} else {
				console.warn('remAddRow: could not locate row to remove for id=', id);
			}
		});

		return this;
	};
})(jQuery);
// this is for 1 tier only but i have not tested it
// (function ($) {
// 	$.fn.remAddRow = function (options) {
// 		const settings = $.extend({
// 			addBtn: null,                 // selector for add button (required)
// 			maxFields: 10,                // maximum visible rows
// 			removeSelector: ".row_remove",// selector used inside the rowTemplate for the remove button
// 			fieldName: "rows",            // used to reindex input names like fieldName[index]
// 			rowIdPrefix: "row",           // prefix used for each row id (row_0, row_1 ...)
// 			reindexOnRemove: true,        // whether to reindex names/data-id after remove
// 			// default template: uses removeSelector (converted to class) and fieldName
// 			rowTemplate: (i, name) => {
// 				const removeClass = (".row_remove".replace(/^\./, "")); // default removeSelector class
// 				return `
// 					<div class="row-box" id="row_${i}">
// 						<span data-row-index>Row #${i+1}</span>
// 						<input type="text" name="${name}[${i}]" />
// 						<button type="button" class="${removeClass}" data-id="${i}">Remove</button>
// 					</div>
// 				`;
// 			},
// 			startCounter: 0,
// 			onAdd: (i, $row) => {},
// 			onRemove: (i) => {}
// 		}, options);
//
// 		const $wrapper = this;
// 		const $addBtn = $(settings.addBtn);
//
// 		// escape a string for safe use in a RegExp
// 		function escapeRegex(s) {
// 			return s.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
// 		}
//
// 		// regex to detect names beginning with `fieldName[<number>]`
// 		const namePrefixRegex = new RegExp('^' + escapeRegex(settings.fieldName) + '\\[\\d+\\]');
//
// 		// reindex rows so indexes in names and data-id become 0..n-1
// 		function reindexRows() {
// 			$wrapper.children().each(function (i) {
// 				const $row = $(this);
//
// 				// set new id like prefix_i
// 				$row.attr('id', `${settings.rowIdPrefix}_${i}`);
//
// 				// update any visible "index" elements if present
// 				$row.find('[data-row-index]').each(function () {
// 					$(this).text($(this).data('row-index-offset') ? $(this).data('row-index-offset') + i : i + 1);
// 				});
//
// 					// rename inputs/selects/textareas that start with fieldName[...] => fieldName[i]...
// 				$row.find('input[name], select[name], textarea[name]').each(function () {
// 					const name = $(this).attr('name');
// 					if (!name) return;
// 					const newName = name.replace(namePrefixRegex, `${settings.fieldName}[${i}]`);
// 					$(this).attr('name', newName);
// 				});
//
// 				// update remove button data-id(s)
// 				$row.find(settings.removeSelector).attr('data-id', i);
// 			});
// 		}
//
// 		// update add button enabled state using actual current count
// 		function updateAddBtnState() {
// 			if (!$addBtn.length) return;
// 			const currentCount = $wrapper.children().length;
// 			$addBtn.prop('disabled', currentCount >= settings.maxFields);
// 		}
//
// 		// initialize: ensure pre-existing rows are reindexed (if any)
// 		if (settings.reindexOnRemove) reindexRows();
// 		updateAddBtnState();
//
// 		// ADD handler: base next index on current number of children (keeps indices contiguous)
// 		$addBtn.on('click', function () {
// 			const currentCount = $wrapper.children().length;
// 			if (currentCount >= settings.maxFields) return;
// 				const index = currentCount; // next index
// 				const $row = $(settings.rowTemplate(index, settings.fieldName));
// 				$wrapper.append($row);
// 				// If rowTemplate didn't embed the correct data-id or names, we reindex to be safe
// 				if (settings.reindexOnRemove) reindexRows();
// 				settings.onAdd(index, $row);
// 				updateAddBtnState();
// 			});
//
// 		// REMOVE (delegated). We find the nearest child-of-wrapper ancestor to remove.
// 		$wrapper.on('click', settings.removeSelector, function (e) {
// 			e.preventDefault();
// 			const clicked = $(this);
// 			const id = clicked.data('id');
//
// 			// prefer closest ancestor whose id ends with _<id>
// 			let $target = clicked.closest(`[id$="_${id}"]`);
//
// 			// fallback: find first ancestor whose parent is wrapper (i.e., direct child of wrapper)
// 			if (!$target.length) {
// 				$target = clicked.parents().filter(function () {
// 					return $(this).parent().is($wrapper);
// 				}).first();
// 			}
//
// 			// final fallback: closest .row-box
// 			if (!$target.length) $target = clicked.closest('.row-box');
//
// 			if ($target.length) {
// 				$target.remove();
// 				if (settings.reindexOnRemove) reindexRows();
// 				settings.onRemove(id);
// 				updateAddBtnState();
// 			} else {
// 				console.warn('remAddRow: could not locate row to remove for id=', id);
// 			}
// 		});
//
// 		return this;
// 	};
// })(jQuery);

// this is for 2 tiers
// (function($){
//   $.fn.remAddRow = function(options){
//     const settings = $.extend({
//       addBtn: null,
//       maxFields: 10,
//       fieldName: "rows",
//       rowIdPrefix: "row",
//       removeSelector: ".row_remove",
//       rowTemplate: (i, name) => `
//         <div class="row-box" id="${settings.rowIdPrefix}_${i}">
//           <span data-row-index>Row #${i+1}</span>
//           <input type="text" name="${name}[${i}]">
//           <button type="button" class="row_remove" data-id="${i}">X</button>
//         </div>
//       `,
//       startCounter: 0,
//       onAdd: (i, $row) => {},
//       onRemove: (i) => {}
//     }, options);
//
//     const $wrapper = this;
//     let counter = settings.startCounter;
//
//     $(settings.addBtn).on("click", function(){
//       if(counter < settings.maxFields){
//         const index = counter++;
//         const $row = $(settings.rowTemplate(index, settings.fieldName));
//         $wrapper.append($row);
//         settings.onAdd(index, $row);
//       }
//     });
//
//     $wrapper.on("click", settings.removeSelector, function(e){
//       e.preventDefault();
//       const id = $(this).data("id");
//       $(`#${settings.rowIdPrefix}_${id}`).remove();
//       settings.onRemove(id);
//     });
//
//     return this;
//   };
// })(jQuery);

// this is for unlimited tiers
// (function ($) {
// 	$.fn.remAddRow = function (options) {
// 		const settings = $.extend({
// 			addBtn: null,
// 			maxFields: 10,
// 			fieldName: "items",
// 			rowIdPrefix: "row",
// 			removeSelector: ".row_remove",
// 			rowTemplate: (i, name, prefix) => `
//         <div class="row-box" id="${prefix}_${i}">
//           <span>${prefix} #${i + 1}</span>
//           <input type="text" name="${name}[${i}][name]" placeholder="Item ${i + 1}">
//           <button type="button" class="row_remove" data-id="${i}">X</button>
//           <div class="nested">
//             <div id="${prefix}_${i}_wrap"></div>
//             <button type="button" id="${prefix}_${i}_add">+ Add Child</button>
//           </div>
//         </div>
// 				`,
// 				startCounter: 0,
// 				onAdd: (i, $row) => {},
// 				onRemove: (i) => {}
// 			}, options);
//
// 		const $wrapper = this;
//     let counter = settings.startCounter; // keep local to each wrapper
//
//     $(settings.addBtn).off("click").on("click", function () {
//     	if (counter < settings.maxFields) {
//     		const index = counter++;
//     		const prefix = settings.rowIdPrefix;
//     		const $row = $(settings.rowTemplate(index, settings.fieldName, prefix));
//     		$wrapper.append($row);
//
//     		console.log(`Added row: ${prefix}_${index}`);
//
//         // Recursive init for nested wrapper
//     		$(`#${prefix}_${index}_wrap`).remAddRow({
//     			addBtn: `#${prefix}_${index}_add`,
//     			maxFields: 5,
//     			fieldName: `${settings.fieldName}[${index}][children]`,
//     			rowIdPrefix: `${prefix}_${index}`,
//     			removeSelector: settings.removeSelector,
//     			rowTemplate: settings.rowTemplate,
//     			onAdd: settings.onAdd,
//     			onRemove: settings.onRemove
//     		});
//
//     		settings.onAdd(index, $row);
//     	}
//     });
//
//     $wrapper.off("click", settings.removeSelector).on("click", settings.removeSelector, function (e) {
//     	e.preventDefault();
//     	const id = $(this).data("id");
//     	const selector = `#${settings.rowIdPrefix}_${id}`;
//     	$(selector).remove();
//     	console.log(`Removed row: ${selector}`);
//     	settings.onRemove(id);
//     });
//
//     return this;
//   };
// })(jQuery);
export default $; // so we can import jQuery with plugin attached

///////////// html ////////////
// <h2>Skills</h2>
// <div id="skills_wrap" class="section"></div>
// <button id="skills_add">+ Add Skill</button>

///////////// usage ////////////
//  $("#skills_wrap").remAddRow({
//    addBtn: "#skills_add",
//    maxFields: 5,
//    removeSelector: ".skill_remove",
//    fieldName: "skills",
//    rowIdPrefix: "skill",
//    // rowTemplate must use the same removeSelector class so delegated handler fires:
//    rowTemplate: (i, name) => `
//      <div class="row-box" id="skill_${i}">
//        <span data-row-index>Skill #${i+1}</span>
//        <input type="text" name="${name}[${i}]" placeholder="Skill ${i+1}">
//        <button type="button" class="skill_remove" data-id="${i}">X</button>
//      </div>
//    `,
//    onAdd: (i, $r) => {
//    											doSomething(i, $row);
//											    doSomethingElse(i, $row);
//		},
//    onRemove: (i) => {
//													console.log('Skill removed', i)
//		}
//  });
