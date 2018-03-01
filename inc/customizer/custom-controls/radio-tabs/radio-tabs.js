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
					var control_name = val.replace( '[', '-' );
					control_name = control_name.replace( ']', '' );
					control_section.find( '#customize-control-' + control_name ).css( 'display', 'list-item' );
				});
			}

			var CustomCustomizerToggle = {};
			for ( var i = 0; i < dependent_controls.length; i++ ) {
				var toggle_key = dependent_controls[i];
				var toggle_parent_controls = 'undefined' != ASTCustomizer.toogle_parent_map[ toggle_key ] ? ASTCustomizer.toogle_parent_map[ toggle_key ] : null;
				if( 'undefined' != typeof toggle_parent_controls && toggle_parent_controls.length > 0 ) {
					for ( var j = 0; j < toggle_parent_controls.length; j++ ) {
						CustomCustomizerToggle[toggle_parent_controls[j]] = ASTCustomizerToggles[ toggle_parent_controls[j] ];
					}
				}
			}

			if( Object.keys( CustomCustomizerToggle ).length > 0 ) {
				ASTCustomizer._initToggles( CustomCustomizerToggle );
			}
		}


	});
