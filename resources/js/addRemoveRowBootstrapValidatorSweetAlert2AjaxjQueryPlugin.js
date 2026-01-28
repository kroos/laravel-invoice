(function ($) {
	'use strict';

	const old = $.fn.remAddRow;

	$.fn.remAddRow = function (options) {

		if (!this.length) {
			console.warn('[remAddRow] No elements found');
			return this;
		}

		/* ========================
		 * DEFAULT CONFIG
		 * ====================== */
		const defaults = {
			addBtn: '',
			maxRows: 5,
			startRow: 0,
			fieldName: 'data',
			rowSelector: 'rowserial',
			removeClass: 'serial_remove',
			nestedwrapper: null,
			rowTemplate: null,
			onAdd: null,
			onRemove: null,

			reindexRowName: ['name', 'data-bv-field', 'data-bv-for'],
			reindexRowID: ['id', 'for', 'aria-describedby'],
			reindexRowIndex: ['data-index', 'data-id'],

			// OPTIONAL
			validator: null,

			// OPTIONAL – SweetAlert2
			swal: {
				options: {
					title: 'Are you sure?',
					text: 'It will be deleted permanently!',
					icon: 'warning',
					showCancelButton: true,
					allowOutsideClick: false,
					showLoaderOnConfirm: true,
					confirmButtonText: 'Yes, delete it!',
					/*confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',*/

					cancelTitle: 'Cancelled',
					cancelMessage: 'Your data is safe from delete',
					cancelType: 'info',

					errorTitle: 'Ajax Error',
					errorMessage: 'Something went wrong with ajax',
					errorType: 'error'
				},
				ajax: {
					dbPrimaryKeyId: 'id', // ✅ DEFAULT
					url: null,
					method: 'DELETE',
					dataType: 'json',
					data: {},
				}
			}
		};

		const settings = Object.assign({}, defaults, options);

		// 🔧 Deep-merge swal defaults safely
		if (settings.swal) {
			settings.swal = $.extend(true, {}, defaults.swal, options.swal);
		}

		// Smart merge reindex arrays
		['reindexRowName', 'reindexRowID', 'reindexRowIndex'].forEach(key => {
			if (key in options) {
				settings[key] = Array.isArray(options[key])
					? [...new Set([...(defaults[key] || []), ...options[key]])]
					: options[key];
			} else {
				settings[key] = [...(defaults[key] || [])];
			}
		});

		const $wrapper = this;
		let i = settings.startRow;

		/* ========================
		 * VALIDATOR HELPERS
		 * ====================== */

		function resolveValidatorField(key, fieldName, index) {
			if (key.startsWith('[') && key.endsWith(']')) {
				return `${fieldName}[${index}]${key}`;
			}

			return key
				.replace(/{fieldName}/g, fieldName)
				.replace(/{index}/g, index);
		}

		function handleValidatorAdd(index, $row) {
			if (!settings.validator) return;

			const { form, fields } = settings.validator;
			const $form = $(form);

			if (!$form.length || typeof $form.bootstrapValidator !== 'function') {
				console.error('[remAddRow][validator] bootstrapValidator not found');
				return;
			}

			Object.entries(fields).forEach(([key, rules]) => {
				const fieldName = resolveValidatorField(key, settings.fieldName, index);
				const $field = $row.find(`[name="${fieldName}"]`);

				if (!$field.length) return;
				$form.bootstrapValidator('addField', $field, rules);
			});
		}

		function handleValidatorRemove(index, $row) {
			if (!settings.validator) return;

			const { form, fields } = settings.validator;
			const $form = $(form);

			if (!$form.length || typeof $form.bootstrapValidator !== 'function') return;

			Object.keys(fields).forEach(key => {
				const fieldName = resolveValidatorField(key, settings.fieldName, index);
				const $field = $row.find(`[name="${fieldName}"]`);
				if ($field.length) {
					$form.bootstrapValidator('removeField', $field);
				}
			});
		}

		/* ========================
		 * INIT
		 * ====================== */

		function init() {

			const y = Number(settings.startRow);
			const x = Number($wrapper.find(`.${settings.rowSelector}`).length ?? $wrapper.find(`#${settings.rowSelector}_${i}`).length );
			const i = y + x;
			// console.log(i);

			// const i = $wrapper.find(`.${settings.rowSelector}`).length ?? $wrapper.find(`#${settings.rowSelector}_${i}`).length ;

			if (settings.addBtn) {
				$(settings.addBtn)
					.off('click.remAddRow')
					.on('click.remAddRow', addRow);
			}

			$wrapper
				.off('click.remAddRow', `.${settings.removeClass}`)
				.on('click.remAddRow', `.${settings.removeClass}`, removeRow);

			return methods;
		}

		/* ========================
		 * ADD ROW
		 * ====================== */

		function addRow(e) {
			const a = Number(settings.startRow);
			const b = Number(settings.maxRows);
			const totalRows = a + b;

			if (i >= totalRows) return false;

			// if (i >= settings.maxRows) return false;

			const index = i;
			const html = createRowHTML(index);
			$wrapper.append(html);

			const $row = $(`#${settings.rowSelector}_${index}`, $wrapper);
			handleValidatorAdd(index, $row);

			if (typeof settings.onAdd === 'function') {
				const result = settings.onAdd(index, e, $row, settings.fieldName);
				if (result === false) return false;
			}

			i++;
			e?.preventDefault?.();
			return false;
		}

		function createRowHTML(index) {
			if (typeof settings.rowTemplate === 'function') {
				return settings.rowTemplate(index, settings.fieldName);
			}

			return `
				<div id="${settings.rowSelector}_${index}" class="row m-0 ${settings.rowSelector}">
					<input type="hidden" name="${settings.fieldName}[${index}][${settings.swal.ajax.dbPrimaryKeyId}]" value="">

					<div class="form-group row m-0">
						<label for="name_${index}" class="col-form-label col-sm-4">Name : </label>
						<div class="col-sm-8 my-auto">
							<input type="text"
									 name="${settings.fieldName}[${index}][name]"
									 value=""
									 id="name_${index}"
									 class="form-control form-control-sm"
									 placeholder="Name">
						</div>
					</div>

					<div class="form-group row m-0">
						<label for="skill_${index}" class="col-form-label col-sm-4">Skill : </label>
						<div class="col-sm-8 my-auto">
							<input type="text"
									 name="${settings.fieldName}[${index}][skill]"
									 value=""
									 id="skill_${index}"
									 class="form-control form-control-sm"
									 placeholder="Skill">
						</div>
					</div>

					<div class="col-sm-4 m-0">
						<button type="button"
								class="btn btn-sm btn-outline-danger ${settings.removeClass}"
								data-index="${index}">Remove</button>
					</div>
				</div>
			`;
		}

		/* ========================
		 * REMOVE ROW (WITH SWAL)
		 * ====================== */

		async function removeRow(e) {
			const $btn = $(this);
			// const index = $btn.data('index') ?? $btn.data('id');

		 const index = $btn.attr('data-index') ?? $btn.attr('data-id');
			// console.log(index);

			let $row = $(`#${settings.rowSelector}_${index}`, $wrapper);
			if (!$row.length) {
				$row = $btn.closest(`.${settings.rowSelector}`);
			}
			if (!$row.length) return false;

			// 🔹 USER CALLBACK FIRST
			if (typeof settings.onRemove === 'function') {
				const result = settings.onRemove(index, e, $row, settings.fieldName);
				if (result?.then) {
					const resolved = await result;
					if (resolved === false) return false;
				} else if (result === false) {
					return false;
				}
			}

			/* ========================
			 * SWEETALERT HANDLING
			 * ====================== */

			if (settings.swal && settings.swal.ajax && settings.swal.ajax.url) {

				const $dbIdInput = $row.find(
					`[name="${settings.fieldName}[${index}][${settings.swal.ajax.dbPrimaryKeyId}]"]`
				);

				if ($dbIdInput.length === 0) {
					console.error(
						`[remAddRow][swal] Cannot find dbId input: ${settings.fieldName}[${index}][${settings.swal.ajax.dbPrimaryKeyId}]`,
						$row
					);
					return false;
				}

				const dbId = $dbIdInput.val();

				// dbId EXISTS → confirm + ajax
				if (dbId) {
					const opt = settings.swal.options;
					const result = await swal.fire(opt);

					if (result.isDismissed) {
						await swal.fire(opt.cancelTitle, opt.cancelMessage, opt.cancelType);
						return false;
					}

					try {
						await $.ajax({
							type: settings.swal.ajax.method || 'DELETE',
							url: `${settings.swal.ajax.url}/${dbId}`,
							dataType: settings.swal.ajax.dataType || 'json',
							data: settings.swal.ajax.data || {}
						});
					} catch (err) {
						await swal.fire(opt.errorTitle, opt.errorMessage, opt.errorType);
						return false;
					}
				}
			}

			// 🔹 REMOVE VALIDATORS
			handleValidatorRemove(index, $row);

			// 🔹 REMOVE ROW + REINDEX
			$row.remove();
			i--;
			reindexRowAll();

			e?.preventDefault?.();
			return false;
		}

		/* ========================
		 * REINDEX
		 * ====================== */

		function reindexRowNamePattern() {
			if (!settings.reindexRowName.length) return;

			const start = Number(settings.startRow);

			$wrapper.find(`.${settings.rowSelector}`).each(function (newIndex) {
				const $row = $(this);
				const d = start + newIndex;

				settings.reindexRowName.forEach(attr => {

			/* ================================
			 * OUTER PROCESS (NOT inside settings.nestedwrapper)
			 * ================================ */
					var wrapperContainer =  $row.find(`${settings.nestedwrapper} *`);
					$row.find(`[${attr}]`).not(wrapperContainer).each(function () {
						const $el = $(this);
						const val = $el.attr(attr);
						if (!val) return;

						const matches = [...val.matchAll(/\[([^\]]+)\]/g)];
						if (matches.length < 2) return;

						const target = matches[matches.length - 2];

						const before = val.slice(0, target.index);
						const after  = val.slice(target.index + target[0].length);

						$el.attr(attr, `${before}[${d}]${after}`);
					});

			/* ================================
			 * INNER PROCESS (INSIDE swrap)
			 * ================================ */
					$row.find(settings.nestedwrapper).find(`[${attr}]`).each(function () {
						const $el = $(this);
						const val = $el.attr(attr);
						if (!val) return;

						const matches = [...val.matchAll(/\[([^\]]+)\]/g)];
						if (matches.length < 4) return;

						const target = matches[matches.length - 4];

						const before = val.slice(0, target.index);
						const after  = val.slice(target.index + target[0].length);

						$el.attr(attr, `${before}[${d}]${after}`);
					});

				});
			});
		}

		function reindexRowIDPattern() {
			if (!settings.reindexRowID.length) return;

			const start = Number(settings.startRow);

			$wrapper.find(`.${settings.rowSelector}`).each(function (newIndex) {
				const $row = $(this);
				const e = start + newIndex;

				/* ================================
				 * 1) Reindex row id itself
				 * ================================ */
				$row.attr('id', `${settings.rowSelector}_${e}`);

				settings.reindexRowID.forEach(attr => {

					/* ================================
					 * 2) OUTER PROCESS
					 * ================================ */
					$row.find(`[${attr}]`)
					.not($row.find(`${settings.nestedwrapper} *`))
					.each(function () {
						const $el = $(this);
						const val = $el.attr(attr);
						if (!val) return;

						$el.attr(attr, val.replace(/_(\d+)$/, `_${e}`));
					});

					/* ================================
					 * 3) Reindex nested wrapper id
					 * ================================ */
					const $nested = $row.find(settings.nestedwrapper);
					if ($nested.length) {
						const nid = $nested.attr(attr);
						if (nid) {
							$nested.attr(attr, nid.replace(/_(\d+)$/, `_${e}`));
						}
					}

					/* ================================
					 * 4) INNER PROCESS (IDs)
					 * ================================ */
					$row.find(settings.nestedwrapper)
					.find(`[${attr}]`)
					.each(function () {
						const $el = $(this);
						const val = $el.attr(attr);
						if (!val) return;

										// rowserial_501_10 → rowserial_500_10
						$el.attr(attr, val.replace(/_(\d+)(?=_(\d+)$)/, `_${e}`));
					});


				});

				/* ================================
				 * 5) NESTED CLASS FIX (CORRECT PLACE)
				 * ================================ */

				const $nestedWrap = $row.find(settings.nestedwrapper);

				// rowserial_502 → rowserial_501
				const rowRe = new RegExp(`${settings.rowSelector}_(\\d+)`, 'g');

				$nestedWrap.find(`[class*="${settings.rowSelector}_"]`).each(function () {
					const $el = $(this);
					const cls = $el.attr('class');
					if (!cls) return;

					$el.attr('class', cls.replace(rowRe, `${settings.rowSelector}_${e}`));
				});

				// serial_remove_502 → serial_remove_501
				const removeRe = new RegExp(`${settings.removeClass}_(\\d+)`, 'g');

				$nestedWrap.find(`[class*="${settings.removeClass}_"]`).each(function () {
					const $el = $(this);
					const cls = $el.attr('class');
					if (!cls) return;

					$el.attr('class', cls.replace(removeRe, `${settings.removeClass}_${e}`));
				});


			});
		}


		function reindexRowIndexPattern() {
			if (!settings.reindexRowIndex.length) return;

			const start = Number(settings.startRow);

			$wrapper.find(`.${settings.rowSelector}`).each(function (newIndex) {
				const $row = $(this);
				const f = start + newIndex;

				settings.reindexRowIndex.forEach(attr => {

			/* ================================
			 * OUTER PROCESS (NOT inside swrap)
			 * ================================ */
					$row.find(`[${attr}]`)
					.not($row.find(`${settings.nestedwrapper} *`))
					.each(function () {
						const $el = $(this);
						const val = $el.attr(attr);
						if (!val) return;

					// Replace ONLY last number
						$el.attr(attr, val.replace(/(\d+)$/, f));
					});

			/* ================================
			 * INNER PROCESS (INSIDE swrap)
			 * ================================ */
					$row.find(settings.nestedwrapper)
					.find(`[${attr}]`)
					.each(function () {
						const $el = $(this);
						const val = $el.attr(attr);
						if (!val) return;

					// Replace ONLY second-last number
					// 501_10 → 500_10
						$el.attr(attr, val.replace(/(\d+)(?=_(\d+)$)/, f));
					});

				});
			});
		}

		function reindexRowAll() {
			const $rows = $wrapper.find(`.${settings.rowSelector}`);
			if (!$rows.length) return;

			reindexRowIDPattern();
			reindexRowNamePattern();
			reindexRowIndexPattern();
		}

		/* ========================
		 * PUBLIC API
		 * ====================== */

		const methods = {
			add() {
				addRow(new Event('click'));
				return this;
			},
			remove(index) {
				$wrapper
					.find(`#${settings.rowSelector}_${index} .${settings.removeClass}`)
					.trigger('click.remAddRow');
				return this;
			},
			getCount() {
				return i;
			},
			reset() {
				$wrapper.find(`.${settings.rowSelector}`).remove();
				i = 0;
				return this;
			},
			reindexAll() {
				reindexRowAll();
				return this;
			},
			destroy() {
				if (settings.addBtn) {
					$(settings.addBtn).off('click.remAddRow');
				}
				$wrapper.off('click.remAddRow', `.${settings.removeClass}`);
				this.reset();
				return this;
			}
		};

		return init();
	};

	$.fn.remAddRow.noConflict = function () {
		$.fn.remAddRow = old;
		return this;
	};

})(jQuery);
