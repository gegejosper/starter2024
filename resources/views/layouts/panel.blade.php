
<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	@include('layouts.meta')
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_app_body" data-kt-app-header-fixed="true" data-kt-app-header-fixed-mobile="true" data-kt-app-header-stacked="true" data-kt-app-header-primary-enabled="true" data-kt-app-header-secondary-enabled="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" class="app-default">
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
		<!--begin::App-->
		<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
			<!--begin::Page-->
			<div class="app-page flex-column flex-column-fluid" id="kt_app_page">
				@include('layouts.menus.menu')
				
				<!--begin::Wrapper-->
				<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
					<!--begin::Sidebar-->
						@include('layouts.aside')
					
					<!--end::Sidebar-->
					<!--begin::Main-->
					@yield('content')
					<!--end:::Main-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::App-->
		<!--begin::Drawers-->
			
			@include('layouts.drawers')
		
		<!--end::Drawers-->
		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<i class="ki-outline ki-arrow-up"></i>
		</div>
		<!--end::Scrolltop-->
		<!--begin::Modals-->
		@include('layouts.modals')
		<!--end::Modals-->
		<!--begin::Javascript-->
		@include('layouts.footer')
	</body>
	<!--end::Body-->
</html>