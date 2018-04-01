{{------------------------------------------------------}}
{{-- fonts --}}
{{------------------------------------------------------}}

@font-face {
font-family: {{setting('font.bold')}};
font-style: normal;
font-weight: bold;
src: url('../fonts/{{ locale('dir') }}/{{setting('font.bold')}}.eot');
src: url('../fonts/{{ locale('dir') }}/{{setting('font.bold')}}.eot?#iefix') format('embedded-opentype'),
url('../fonts/{{ locale('dir') }}/{{setting('font.bold')}}.woff') format('woff'),
url('../fonts/{{ locale('dir') }}/{{setting('font.bold')}}.ttf') format('truetype');
}

@font-face {
font-family: {{setting('font.medium')}};
font-style: normal;
font-weight: 400;
src: url('../fonts/{{ locale('dir') }}/{{setting('font.medium')}}.eot');
src: url('../fonts/{{ locale('dir') }}/{{setting('font.medium')}}.eot?#iefix') format('embedded-opentype'),
url('../fonts/{{ locale('dir') }}/{{setting('font.medium')}}.woff') format('woff'),
url('../fonts/{{ locale('dir') }}/{{setting('font.medium')}}.ttf') format('truetype');
}

@font-face {
font-family: {{setting('font.normal')}};
font-style: normal;
font-weight: 100;
src: url('../fonts/{{ locale('dir') }}/{{setting('font.normal')}}.eot');
src: url('../fonts/{{ locale('dir') }}/{{setting('font.normal')}}.eot?#iefix') format('embedded-opentype'),
url('../fonts/{{ locale('dir') }}/{{setting('font.normal')}}.woff') format('woff'),
url('../fonts/{{ locale('dir') }}/{{setting('font.normal')}}.ttf') format('truetype');
}


body{
font-family:'{{setting('font.normal')}}';
}

h1,h2,h3{
font-family:'{{setting('font.normal')}}';
}

html[lang="{{ app()->getLocale() }}"]{
font-size: {{setting('font.size')}}px;
}

{{------------------------------------------------------}}
{{--vibrant--}}
{{------------------------------------------------------}}

.bg_vibrant {
background-color: {{setting('color.bg_vibrant')}} !important;
color: {{setting('color.text_vibrant')}};
}
.text_vibrant {
color: {{setting('color.bg_vibrant')}} !important;
}
.border_vibrant {
border-color: {{setting('color.bg_vibrant')}} !important;
}

.bg_vibrant_hover {
background-color: {{setting('color.bg_vibrant_hover')}} !important;
color: {{setting('color.text_vibrant_hover')}};
}
.text_vibrant_hover {
color: {{setting('color.bg_vibrant_hover')}} !important;
}
.border_vibrant_hover {
border-color: {{setting('color.bg_vibrant_hover')}} !important;
}

.text_bg_vibrant{
color: {{setting('color.text_vibrant')}};
}

.text_bg_vibrant_hover{
color: {{setting('color.text_vibrant_hover')}};
}

.border_bg_vibrant{
border-color: {{setting('color.border_vibrant')}} !important;
}

.bg_border_vibrant{
background-color: {{setting('color.border_vibrant')}} !important;
}

.border_bg_vibrant_hover{
border-color: {{setting('color.border_vibrant')}} !important;
}

.border_bg_vibrant{
border-color: {{setting('color.border_vibrant')}} !important;
}

.bg_vibrant-hover:hover {
background-color: {{setting('color.bg_vibrant_hover')}} !important;
color: {{setting('color.text_vibrant_hover')}} !important;
}

.bg_vibrant_hover-hover:hover {
background-color: {{setting('color.bg_vibrant')}} !important;
color: {{setting('color.text_dark')}} !important;
}


{{------------------------------------------------------}}
{{--muted--}}
{{------------------------------------------------------}}
.bg_muted {
background-color: {{setting('color.bg_muted')}} !important;
color: {{setting('color.text_muted')}};
}
.text_muted {
color: {{setting('color.bg_muted')}} !important;
}
.border_muted {
border-color: {{setting('color.bg_muted')}} !important;
}

.bg_muted_hover {
background-color: {{setting('color.bg_muted_hover')}} !important;
color: {{setting('color.text_muted_hover')}};
}
.text_muted_hover {
color: {{setting('color.bg_muted_hover')}} !important;
}
.border_muted_hover {
border-color: {{setting('color.bg_muted_hover')}} !important;
}

.text_bg_muted{
color: {{setting('color.text_muted')}};
}

.text_bg_muted_hover{
color: {{setting('color.text_muted_hover')}};
}

.border_bg_muted{
border-color: {{setting('color.border_muted')}} !important;
}

.bg_border_muted{
background-color: {{setting('color.border_muted')}} !important;
}

.border_bg_muted_hover{
border-color: {{setting('color.border_muted')}} !important;
}

.border_bg_muted{
border-color: {{setting('color.border_muted')}} !important;
}

.bg_muted-hover:hover {
background-color: {{setting('color.bg_muted_hover')}} !important;
color: {{setting('color.text_muted_hover')}} !important;
}

.bg_muted_hover-hover:hover {
background-color: {{setting('color.bg_muted')}} !important;
color: {{setting('color.text_dark')}} !important;
}


{{------------------------------------------------------}}
{{--dark--}}
{{------------------------------------------------------}}
.bg_dark {
background-color: {{setting('color.bg_dark')}} !important;
color: {{setting('color.text_dark')}};
}
.text_dark {
color: {{setting('color.bg_dark')}} !important;
}
.border_dark {
border-color: {{setting('color.bg_dark')}} !important;
}

.bg_dark_hover {
background-color: {{setting('color.bg_dark_hover')}} !important;
color: {{setting('color.text_dark_hover')}};
}
.text_dark_hover {
color: {{setting('color.bg_dark_hover')}} !important;
}
.border_dark_hover {
border-color: {{setting('color.bg_dark_hover')}} !important;
}

.text_bg_dark{
color: {{setting('color.text_dark')}};
}

.text_bg_dark_hover{
color: {{setting('color.text_dark_hover')}};
}

.border_bg_dark{
border-color: {{setting('color.border_dark')}} !important;
}

.bg_border_dark{
background-color: {{setting('color.border_dark')}} !important;
}

.border_bg_dark_hover{
border-color: {{setting('color.border_dark')}} !important;
}

.border_bg_dark{
border-color: {{setting('color.border_dark')}} !important;
}

.bg_dark-hover:hover {
background-color: {{setting('color.bg_dark_hover')}} !important;
color: {{setting('color.text_dark_hover')}} !important;
}

.bg_dark_hover-hover:hover {
background-color: {{setting('color.bg_dark')}} !important;
color: {{setting('color.text_dark')}} !important;
}


{{------------------------------------------------------}}
{{--body--}}
{{------------------------------------------------------}}
.bg_body {
background-color: {{setting('color.bg_body')}} !important;
color: {{setting('color.text_body_content')}};
}

.text_bg_body {
color: {{setting('color.text_body_title')}} !important;
}

.title_bg_body{
color: {{setting('color.text_body_content')}} !important;
}
