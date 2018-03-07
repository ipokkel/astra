/**
 * File radio-image.js
 *
 * Handles toggling the radio images button
 *
 * @package Astra
 */

	wp.customize.controlConstructor['ast-radio-image'] = wp.customize.Control.extend({

		ready: function() {

			'use strict';

			var control = this;

			// Change the value.
			this.container.on( 'click', 'input', function() {
				control.setting.set( jQuery( this ).val() );

				$( document ).trigger('astra-customizer-controls-ast-radio-image-clicked', [control]);
			});

		}

	});
