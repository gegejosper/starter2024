
<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic 
Product Version: 8.2.3
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
	<!--begin::Head-->
    @include('layouts.meta')
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="app-blank bgi-size-cover bgi-attachment-fixed bgi-position-center bgi-no-repeat">
		<!--begin::Theme mode setup on page load-->
        <script>
			var defaultThemeMode = "light"; 
			var themeMode; if ( document.documentElement ) { 
				if ( document.documentElement.hasAttribute("data-bs-theme-mode")) 
					{ themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); 
					} else { 
						if ( localStorage.getItem("data-bs-theme") !== null ) { 
							themeMode = localStorage.getItem("data-bs-theme"); 
						} else { 
							themeMode = defaultThemeMode; 
						} 
					} 
					if (themeMode === "system") { 
						themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; 
					} 
					document.documentElement.setAttribute("data-bs-theme", themeMode); 
				}
		</script>
		<!--end::Theme mode setup on page load-->
		@yield('content')
		
		<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
		<!--end::Javascript-->
        @yield('js_scripts')
	</body>
	<!--end::Body-->
</html>