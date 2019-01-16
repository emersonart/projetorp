(function ($) {
 "use strict";
 
			// Example 1
            var options1 = {};
            options1.ui = {
                container: "#passwordme",
                showVerdictsInsideProgressBar: false,
                showStatus: true,
                viewports: {
                    progress: ".pwstrength_viewport_progress"
                }
            };
            options1.common = {
                debug: false,
                userInputs: ["#username","#email","#nome"],
                minChar: 6,
                maxChar: 25
            };
            options1.rules = {
                activated: {
                wordMinLength: true,
                wordMaxLength: true,
                wordInvalidChar: true
                }};
            $('.senha1').pwstrength(options1);

            // Example 1
            var options1 = {};
            options1.ui = {
                container: "#passwordme2",
                showVerdictsInsideProgressBar: false,
                viewports: {
                    progress: ".pwstrength_viewport_progress"
                }
            };
            options1.common = {
                debug: false,
                userInputs: ["#username","#email","#nome"],
                minChar: 6,
                maxChar: 25
            };
            options1.rules = {
                activated: {
                wordMinLength: true,
                wordMaxLength: true,
                wordInvalidChar: true
                }};
            $('.senha2').pwstrength(options1);

			
	
})(jQuery); 