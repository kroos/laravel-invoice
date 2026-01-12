/**
 * --------------------------------------------------------------------------
 * jQuery Add/Remove Row Plugin
 * --------------------------------------------------------------------------
 * A lightweight jQuery plugin to dynamically add and remove rows or form fields
 * with automatic reindexing, configurable templates, and event callbacks.
 *
 * Author: kroos
 * License: MIT
 * Version: 2.0.0
 * --------------------------------------------------------------------------
 *
 * 🧩 FEATURES:
 * - Add and remove form rows dynamically
 * - Automatic reindexing of names and IDs (e.g. rows[0], rows[1], ...)
 * - Customizable HTML row template via `rowTemplate()`
 * - Built-in callbacks: `onAdd()` and `onRemove()`
 * - Optional limits for max number of fields
 * - ES module compatible (`export default $`)
 *
 * --------------------------------------------------------------------------
 * 📦 USAGE:
 *
 * HTML:
 *   <div id="rowsWrapper"></div>
 *   <button id="addRowBtn" type="button">Add Row</button>
 *
 * JS:
 *   $('#rowsWrapper').remAddRow({
 *     addBtn: '#addRowBtn',
 *     fieldName: 'users',
 *     onAdd: (i, $row) => console.log('Added:', i),
 *     onRemove: (i) => console.log('Removed:', i)
 *   });
 *
 * --------------------------------------------------------------------------
 * ⚙️ OPTIONS:
 *
 *  addBtn            → Selector for the Add button (required)
 *  maxFields         → Max number of rows (default: 10)
 *  removeClass    → Selector for remove buttons (default: ".row_remove")
 *  fieldName         → Base name for field groups (default: "rows")
 *  rowIdPrefix       → Prefix for each row id (default: "row")
 *  rowTemplate(i, name) → Function returning HTML for each row
 *  onAdd(i, $row)    → Callback after a new row is added
 *  onRemove(i)       → Callback after a row is removed
 *
 * --------------------------------------------------------------------------
 * 💻 EXAMPLE CUSTOM TEMPLATE:
 *
 *   rowTemplate: (i, name) => `
 *     <div class="user-row" id="user_${i}">
 *       <label>User ${i + 1}</label>
 *       <input type="text" name="${name}[${i}][name]" />
 *       <button type="button" class="btn btn-danger row_remove" data-id="${i}">
 *         Remove
 *       </button>
 *     </div>
 *   `
 *
 * --------------------------------------------------------------------------
 * 🧠 NOTES:
 * - Works great with Laravel-style indexed form arrays.
 * - Reindexes automatically on both add and remove events.
 * - Disable add button automatically when `maxFields` is reached.
 * - Compatible with Bootstrap, TailwindCSS, or custom UI frameworks.
 * - You can safely import/export with modern build systems.
 *
 * --------------------------------------------------------------------------
 */

// remAddRow jQuery Plugin - ES6 Compatible
(function($) {
	'use strict';

	// Plugin definition
	$.fn.remAddRow = function(options) {
		// Make sure we have elements to work with
		if (!this.length) {
			console.warn('remAddRow: No elements found');
			return this;
		}

		// Default settings
		const defaults = {
			addBtn: '',
			maxRows: 5,
			startRow: 0,
			fieldName: 'data',
			rowSelector: 'rowserial',
			removeClass: 'serial_remove',
			onAdd: null,
			onRemove: null,
			// Default reindexing patterns
			reindexRowName: ['name', 'data-bv-field', 'data-bv-for'],
			reindexRowID: ['id', 'for', 'aria-describedby'],
			reindexRowIndex: ['data-index', 'data-id']
		};

		// Merge options
		const settings = Object.assign({}, defaults, options);

		// custom
		// 🔹 Smart merge for reindex arrays
		['reindexRowName', 'reindexRowID', 'reindexRowIndex'].forEach(key => {
			if (key in options) {
				// If user explicitly sets it (even empty), respect it
				settings[key] = Array.isArray(options[key])
				? [...new Set([...(defaults[key] || []), ...options[key]])]
				: options[key];
			} else {
				// User did NOT provide it → keep defaults
				settings[key] = [...(defaults[key] || [])];
			}
		});



		const $wrapper = this;
		let i = settings.startRow;

		// Initialize
		function init() {
			// Count existing rows (0-based index)
			i = $wrapper.find(`.${settings.rowSelector}`).length;

			// Attach click event to add button
			if (settings.addBtn) {
				$(settings.addBtn).off('click.remAddRow').on('click.remAddRow', addRow);
			}

			// Delegate remove button events
			$wrapper.off('click.remAddRow', `.${settings.removeClass}`)
			.on('click.remAddRow', `.${settings.removeClass}`, removeRow);

			return methods;
		}

		// Add a new row
		const addRow = function(e) {
			if (i < settings.maxRows) {
				const currentIndex = i;
				const rowHTML = createRowHTML(currentIndex);
				$wrapper.append(rowHTML);
				i++;

				// Callback with your signature: (index, event, $row, name)
				if (typeof settings.onAdd === 'function') {
					const $newRow = $(`#${settings.rowSelector}_${currentIndex}`, $wrapper);
					settings.onAdd(currentIndex, e, $newRow, settings.fieldName);
				}

				if (e && e.preventDefault) {
					e.preventDefault();
				}
			} else {
				console.log(`Maximum rows reached: ${settings.maxRows}`);
			}
			return false;
		};

		// Create row HTML - uses your template function
		const createRowHTML = function(index) {
			// Use custom template if provided (with your signature: (i, name))
			if (typeof settings.rowTemplate === 'function') {
				return settings.rowTemplate(index, settings.fieldName);
			}

			// Default template
			return `
				<div id="${settings.rowSelector}_${index}" class="row m-0 ${settings.rowSelector}">
					<input type="hidden" name="${settings.fieldName}[${index}][id]" value="">

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
		};

		// Remove a row
		const removeRow = function(e) {
			const $button = $(this);
			const idIndex = $button.data('index');
			let $row = $(`#${settings.rowSelector}_${idIndex}`, $wrapper);

			// Fallback: try to find row by traversing DOM
			if (!$row.length) {
				$row = $button.closest(`.${settings.rowSelector}`);
			}

			if ($row.length) {
				// Callback with your signature: (index, event, $row, name)
				// Return false to PREVENT removal, true to ALLOW removal
				if (typeof settings.onRemove === 'function') {
					if (settings.onRemove(idIndex, e, $row, settings.fieldName) === false) {
						console.log(`Removal blocked by onRemove callback for row ${idIndex}`);
						return false; // ❌ BLOCK removal
					}
				}

				// ✅ ALLOW removal
				$row.remove();
				i--;
				reindexRowAll(); // This runs only if removal is allowed
				console.log(`Row ${idIndex} removed, reindexing triggered`);
			}

			if (e && e.preventDefault) {
				e.preventDefault();
			}
			return false;
		};

		// Reindex functions (unchanged)
		const reindexRowNamePattern = function() {
			if (!settings.reindexRowName || !settings.reindexRowName.length) return;
			const $rows = $wrapper.find(`.${settings.rowSelector}`);
			$rows.each(function(newIndex) {
				const newPosition = newIndex;
				const $row = $(this);
				settings.reindexRowName.forEach(function(attrName) {
					$row.find(`[${attrName}*="${settings.fieldName}"]`).each(function() {
						const $element = $(this);
						const attrValue = $element.attr(attrName);
						const regex = new RegExp(`${settings.fieldName}\\[(\\d+)\\]`);
						const match = attrValue.match(regex);
						if (match && match[1]) {
							const newValue = attrValue.replace(
							                                   new RegExp(`${settings.fieldName}\\[${match[1]}\\]`, 'g'),
							                                 `${settings.fieldName}[${newPosition}]`
							                                 );
							$element.attr(attrName, newValue);
						}
					});
				});
			});
		};

		const reindexRowIDPattern = function() {
			if (!settings.reindexRowID || !settings.reindexRowID.length) return;
			const $rows = $wrapper.find(`.${settings.rowSelector}`);
			$rows.each(function(newIndex) {
				const newPosition = newIndex;
				const $row = $(this);
				$row.attr('id', `${settings.rowSelector}_${newPosition}`);
				settings.reindexRowID.forEach(function(attrName) {
					$row.find(`[${attrName}*="_"]`).each(function() {
						const $element = $(this);
						const attrValue = $element.attr(attrName);
						if (attrValue && attrValue.match(/_\d+$/)) {
							const newValue = attrValue.replace(/_\d+$/, `_${newPosition}`);
							$element.attr(attrName, newValue);
						}
					});
				});
			});
		};

		const reindexRowIndexPattern = function() {
			if (!settings.reindexRowIndex || !settings.reindexRowIndex.length) return;
			const $rows = $wrapper.find(`.${settings.rowSelector}`);
			$rows.each(function(newIndex) {
				const newPosition = newIndex;
				const $row = $(this);
				settings.reindexRowIndex.forEach(function(attrName) {
					$row.find(`[${attrName}]`).each(function() {
						const $element = $(this);
						const attrValue = $element.attr(attrName);
						if (attrValue && /^\d+$/.test(attrValue)) {
							$element.attr(attrName, newPosition);
						}
					});
				});
			});
		};

		// Master reindex function
		const reindexRowAll = function() {
			const $rows = $wrapper.find(`.${settings.rowSelector}`);
			if ($rows.length === 0) return;

			// Reindex all attributes
			reindexRowIDPattern();      // First: IDs and FOR attributes
			reindexRowNamePattern();    // Second: Name attributes
			reindexRowIndexPattern();   // Third: Index-based attributes

			console.log(`Reindexing complete. Now ${$rows.length} rows.`);
		};

		// Public methods
		const methods = {
			add: function() {
				if (i < settings.maxRows) {
					const event = new Event('click');
					addRow(event);
				}
				return this;
			},
			remove: function(index) {
				const $removeBtn = $wrapper.find(`#${settings.rowSelector}_${index} .${settings.removeClass}`);
				if ($removeBtn.length) {
					$removeBtn.trigger('click.remAddRow');
				}
				return this;
			},
			getCount: function() {
				return i;
			},
			reset: function() {
				$wrapper.find(`.${settings.rowSelector}`).remove();
				i = 0;
				return this;
			},
			reindexAll: function() {
				reindexRowAll();
				return this;
			},
			setReindexConfig: function(type, attributes) {
				if (type === 'name') {
					settings.reindexRowName = Array.isArray(attributes) ? attributes : [attributes];
				} else if (type === 'id') {
					settings.reindexRowID = Array.isArray(attributes) ? attributes : [attributes];
				} else if (type === 'index') {
					settings.reindexRowIndex = Array.isArray(attributes) ? attributes : [attributes];
				}
				return this;
			},
			getConfig: function() {
				return {
					fieldName: settings.fieldName,
					rowSelector: settings.rowSelector,
					removeClass: settings.removeClass,
					maxRows: settings.maxRows,
					currentIndex: i,
					reindexConfig: {
						name: settings.reindexRowName,
						id: settings.reindexRowID,
						index: settings.reindexRowIndex
					}
				};
			},
			destroy: function() {
				if (settings.addBtn) {
					$(settings.addBtn).off('click.remAddRow');
				}
				$wrapper.off('click.remAddRow', `.${settings.removeClass}`);
				this.reset();
				return this;
			}
		};

		// Initialize and return methods
		return init();
	};

	// Add noConflict method
	$.fn.remAddRow.noConflict = function() {
		$.fn.remAddRow = old;
		return this;
	};

	// Store the old version in case of conflict
	const old = $.fn.remAddRow;

})(jQuery);

/*
			$('#serial_wrap').remAddRow({
				addBtn: '#serial_add',
				maxRows: 5,
				fieldName: 'per',
				reindexRowName: ['data-name'],	// pattern => ${name}[${i}][product]
				reindexRowID: ['data-id-id'],		// pattern => userdefined_${i}
				reindexRowIndex: ['row-id'],		// pattern => ${i}
				rowTemplate: (i, name) => `
	        <div id="${name}_${i}" class="row m-0 rowserial" data-index="${i}">
	            <div class="col-sm-5">
	                <input type="text"
	                       name="${name}[${i}][product]"
	                       placeholder="Product name"
	                       class="form-control"
												 data-name="${name}[${i}][product]"
												 data-id-id="exp_${i}"
												 row-id="${i}"
	                       required>
	            </div>
	            <div class="col-sm-5">
	                <input type="number"
	                       name="${name}[${i}][quantity]"
	                       placeholder="Quantity"
	                       class="form-control"
	                       min="1"
	                       value="1">
	            </div>
	            <div class="col-sm-2">
	                <button type="button"
	                        class="btn btn-danger serial_remove"
	                        data-index="${i}">
	                    ×
	                </button>
	            </div>
	        </div>
					`,
				onAdd: (index, event, $row, name) => {
					console.log(`✅ Added row ${index} with field name: ${name}`);

					// Auto-focus the first input
					setTimeout(() => {
							$row.find('input').first().focus();
					}, 100);
				},
				onRemove: (index, event, $row, name) => {
					const productName = $row.find(`input[name="${name}[${index}][product]"]`).val();

					// Ask for confirmation with product name
					const confirm = window.confirm(`Delete "${productName || 'this item'}"?`);

					if (!confirm) {
						console.log(`❌ Removal cancelled for row ${index}`);
						return false; // ❌ BLOCK removal
					}

					console.log(`✅ Allowed removal of row ${index}`);
					return true; // ✅ ALLOW removal (reindexing will happen)
				}
			});


The return true/false in onRemove directly controls whether:

	✅ true → Remove row + Run reindexing

	❌ false → Keep row + Skip reindexing
*/
