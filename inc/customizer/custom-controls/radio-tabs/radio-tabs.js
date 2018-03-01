/**
 * File radio-tabs.js
 *
 * Handles toggling the radio images button
 *
 * @package Astra
 */

	wp.customize.controlConstructor['ast-radio-tabs'] = wp.customize.Control.extend({

		ready: function() {

			'use strict';

			var control = this;

			// Change the value.
			this.container.on( 'click', '.radio-tabs-wrapper label', function() {
				
				control.hide_dependent_control( jQuery( this ) );
			});

			setTimeout(function() {
				var label = control.container.find( '.radio-tabs-wrapper label.activated' );
				control.hide_dependent_control( label );
			}, 100);

		},

		hide_dependent_control: function( label ) {

			var parent          = label.parent(),
				control_section = label.closest('.control-section');

			parent.find(' > label').removeClass('activated');
			label.addClass('activated');

			var dependent_controls = label.data('dependent-control').split(',');
			control_section.find('.customize-control:not(.customize-control-ast-radio-tabs)').css( 'display', 'none' );

			if( dependent_controls.length > 0 ) {
				jQuery.each( dependent_controls, function( index, val ) {
					control_section.find( '#customize-control-astra-settings-' + val ).css( 'display', 'list-item' );
				});
			}
		}


	});
