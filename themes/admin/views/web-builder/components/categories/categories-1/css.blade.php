.container {
  width: 100%;
}

@media (min-width: 640px) {
  .container {
    max-width: 640px!important;
  }
}

@media (min-width: 768px) {
  .container {
    max-width: 768px!important;
  }
}

@media (min-width: 1024px) {
  .container {
    max-width: 1024px!important;
  }
}

@media (min-width: 1280px) {
  .container {
    max-width: 1280px!important;
  }
}

@media (min-width: 1536px) {
  .container {
    max-width: 1536px!important;
  }
}

.absolute {
  position: absolute ;
}

.relative {
  position: relative ;
}

.inset-y-0 {
  top: 0px ;
  bottom: 0px ;
}

.right-0 {
  right: 0px ;
}

.mx-auto {
  margin-left: auto ;
  margin-right: auto ;
}

.my-10 {
  margin-top: 2.5rem ;
  margin-bottom: 2.5rem ;
}

.ml-1 {
  margin-left: 0.25rem ;
}

.ml-5 {
  margin-left: 1.25rem ;
}

.mb-10 {
  margin-bottom: 2.5rem ;
}

.mb-3 {
  margin-bottom: 0.75rem ;
}

.mb-2 {
  margin-bottom: 0.5rem ;
}

.mb-4 {
  margin-bottom: 1rem ;
}

.flex {
  display: flex ;
}

.grid {
  display: grid ;
}

.h-12 {
  height: 3rem ;
}

.h-full {
  height: 100% ;
}

.w-full {
  width: 100% ;
}

.w-4 {
  width: 1rem ;
}

.w-20 {
  width: 5rem ;
}

.w-16 {
  width: 4rem ;
}

.max-w-6xl {
  max-width: 72rem ;
}

.max-w-full {
  max-width: 100% ;
}

.flex-1 {
  flex: 1 1 0% ;
}

.cursor-pointer {
  cursor: pointer ;
}

.grid-cols-5 {
  grid-template-columns: repeat(5, minmax(0, 1fr)) ;
}

.grid-rows-1 {
  grid-template-rows: repeat(1, minmax(0, 1fr)) ;
}

.flex-col {
  flex-direction: column ;
}

.items-center {
  align-items: center ;
}

.justify-end {
  justify-content: flex-end ;
}

.justify-center {
  justify-content: center ;
}

.justify-between {
  justify-content: space-between ;
}

.gap-6 {
  gap: 1.5rem ;
}

.gap-10 {
  gap: 2.5rem ;
}

.gap-2 {
  gap: 0.5rem ;
}

.gap-5 {
  gap: 1.25rem ;
}

.overflow-hidden {
  overflow: hidden ;
}

.overflow-x-scroll {
  overflow-x: scroll ;
}

.truncate {
  overflow: hidden ;
  text-overflow: ellipsis ;
  white-space: nowrap ;
}

.text-ellipsis {
  text-overflow: ellipsis ;
}

.text-clip {
  text-overflow: clip ;
}

.whitespace-nowrap {
  white-space: nowrap ;
}

.rounded {
  border-radius: 0.25rem ;
}

.rounded-full {
  border-radius: 9999px ;
}

.bg-blue-500 {
  --tw-bg-opacity: 1 ;
  background-color: rgb(59 130 246 / var(--tw-bg-opacity)) ;
}

.bg-indigo-600 {
  --tw-bg-opacity: 1 ;
  background-color: rgb(79 70 229 / var(--tw-bg-opacity)) ;
}

.p-3 {
  padding: 0.75rem ;
}

.py-4 {
  padding-top: 1rem ;
  padding-bottom: 1rem ;
}

.py-2 {
  padding-top: 0.5rem ;
  padding-bottom: 0.5rem ;
}

.px-4 {
  padding-left: 1rem ;
  padding-right: 1rem ;
}

.px-2 {
  padding-left: 0.5rem ;
  padding-right: 0.5rem ;
}

.py-3 {
  padding-top: 0.75rem ;
  padding-bottom: 0.75rem ;
}

.px-5 {
  padding-left: 1.25rem ;
  padding-right: 1.25rem ;
}

.pr-7 {
  padding-right: 1.75rem ;
}

.text-center {
  text-align: center ;
}

.text-4xl {
  font-size: 2.25rem ;
  line-height: 2.5rem ;
}

.text-lg {
  font-size: 1.125rem ;
  line-height: 1.75rem ;
}

.text-sm {
  font-size: 0.875rem ;
  line-height: 1.25rem ;
}

.text-xs {
  font-size: 0.75rem ;
  line-height: 1rem ;
}

.text-2xl {
  font-size: 1.5rem ;
  line-height: 2rem ;
}

.text-3xl {
  font-size: 1.875rem ;
  line-height: 2.25rem ;
}

.font-bold {
  font-weight: 700 ;
}

.font-medium {
  font-weight: 500 ;
}

.font-semibold {
  font-weight: 600 ;
}

.text-white {
  --tw-text-opacity: 1 ;
  color: rgb(255 255 255 / var(--tw-text-opacity)) ;
}

.text-blue-500 {
  --tw-text-opacity: 1 ;
  color: rgb(59 130 246 / var(--tw-text-opacity)) ;
}

.transition-colors {
  transition-property: color, background-color, border-color, text-decoration-color, fill, stroke ;
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1) ;
  transition-duration: 150ms ;
}

.transition {
  transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, -webkit-backdrop-filter ;
  transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter ;
  transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-backdrop-filter ;
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1) ;
  transition-duration: 150ms ;
}

.products-nav ul li a, .products-nav ul li label {
  cursor: pointer;
  font-size: 0.875rem;
  line-height: 1.25rem;
  font-weight: 300;
  --tw-text-opacity: 1;
  color: rgb(55 65 81 / var(--tw-text-opacity));
  transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, -webkit-backdrop-filter;
  transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;
  transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-backdrop-filter;
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
  transition-duration: 150ms;
}

.products-nav ul li a:hover, .products-nav ul li label:hover {
  --tw-text-opacity: 1;
  color: rgb(59 130 246 / var(--tw-text-opacity));
}

.products-nav ul li label input {
  margin-right: 0.5rem;
  height: 1rem;
  width: 1rem;
  cursor: pointer;
  border-radius: 0.25rem;
  --tw-border-opacity: 1;
  border-color: rgb(209 213 219 / var(--tw-border-opacity));
  --tw-bg-opacity: 1;
  background-color: rgb(243 244 246 / var(--tw-bg-opacity));
  --tw-text-opacity: 1;
  color: rgb(37 99 235 / var(--tw-text-opacity));
  transition-property: color, background-color, border-color, text-decoration-color, fill, stroke;
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
  transition-duration: 150ms;
}

.products-nav ul li label input:checked {
  --tw-border-opacity: 1;
  border-color: rgb(59 130 246 / var(--tw-border-opacity));
  --tw-bg-opacity: 1;
  background-color: rgb(59 130 246 / var(--tw-bg-opacity));
}

.products-nav ul li label input:focus {
  --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
  --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(0px + var(--tw-ring-offset-width)) var(--tw-ring-color);
  box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
  --tw-ring-color: transparent;
}

.products-nav ul li label input:checked ~ span {
  font-size: 0.875rem;
  line-height: 1.25rem;
  --tw-text-opacity: 1;
  color: rgb(59 130 246 / var(--tw-text-opacity));
  transition-property: all;
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
  transition-duration: 150ms;
}

.products-nav ul li label {
  display: flex;
  align-items: center;
  justify-content: flex-start;
}

.products-nav {
  padding-left: 0.25rem;
}

.products-nav ul li.active a {
  font-size: 0.875rem;
  line-height: 1.25rem;
  font-weight: 400;
  --tw-text-opacity: 1;
  color: rgb(59 130 246 / var(--tw-text-opacity));
  transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, -webkit-backdrop-filter;
  transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;
  transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-backdrop-filter;
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
  transition-duration: 150ms;
}

.products-nav ul li:not(:first-child) {
  margin-top: 0.25rem;
}

.hover\:bg-indigo-600:hover {
  --tw-bg-opacity: 1 ;
  background-color: rgb(79 70 229 / var(--tw-bg-opacity)) ;
}

@media (min-width: 640px) {
  .sm\:mx-10 {
    margin-left: 2.5rem !important;
    margin-right: 2.5rem !important;
  }
}

@media (min-width: 768px) {
  .md\:mx-40 {
    margin-left: 10rem !important;
    margin-right: 10rem !important;
  }

  .md\:px-0 {
    padding-left: 0px !important;
    padding-right: 0px !important;
  }

  .md\:text-lg {
    font-size: 1.125rem !important;
    line-height: 1.75rem !important;
  }
}

@media (min-width: 1024px) {
  .lg\:mx-80 {
    margin-left: 20rem !important;
    margin-right: 20rem !important;
  }

  .lg\:mb-10 {
    margin-bottom: 2.5rem ;
  }

  .lg\:gap-6 {
    gap: 1.5rem ;
  }

  .lg\:text-4xl {
    font-size: 2.25rem ;
    line-height: 2.5rem ;
  }

  .lg\:font-bold {
    font-weight: 700 ;
  }
}

@media (min-width: 1280px) {
  .xl\:gap-6 {
    gap: 1.5rem ;
  }
}