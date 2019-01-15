(function ($) {
 "use strict";
 
			// Example 1
            var options1 = {};
            options1.ui = {
                container: "#passwordme",
                showVerdictsInsideProgressBar: true,
                viewports: {
                    progress: ".pwstrength_viewport_progress"
                }
            };
            options1.common = {
                debug: false,
            };
            $('.senha1').pwstrength(options1);

            // Example 1
            var options1 = {};
            options1.ui = {
                container: "#passwordme2",
                showVerdictsInsideProgressBar: true,
                viewports: {
                    progress: ".pwstrength_viewport_progress"
                }
            };
            options1.common = {
                debug: false,
            };
            $('.senha2').pwstrength(options1);

			
	
})(jQuery); 