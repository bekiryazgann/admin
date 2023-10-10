<?php

return [
    "routers" => [
        "/" => "Index@main",
        "admin/" => "Home@main",
        "admin/main/statistic" => "Home@statistic",
        "admin/first-data-load" => "JavaScript@firstDataLoad",
        "admin/last-data-load" => "JavaScript@lastDataLoad",
        "admin/api/change-layout" => "JavaScript@changeLayout",
        "admin/media-manager" => "Media@main",
        "admin/media-manager/new" => "Media@newMedia",
        "admin/theme-editor" => "Designer@main",
        "admin/api/preferences" => "Api@preferences",
        "admin/test" => "Home@test",
        "admin/my-account" => "User@myaccount",
        "admin/api/my-account-password-update" => "User@myAccountPasswordUpdate",
        "admin/users" => "User@users",
        "admin/api/users" => "Api@users",
        "admin/api/newUser" => "Api@newUser",
        "admin/auth/login" => "Auth@login",
        "admin/auth/register" => "Auth@register",
        "admin/auth/forgot-password" => "Auth@forgotPassword",
        "admin/auth/verification" => "Auth@verification",
        "admin/auth/logout" => "Auth@logout",
        "admin/orders" => "Orders@main",
        "admin/orders/:slug" => "Orders@details",
        "admin/orders/payments" => "Orders@payments",
        "admin/orders/bills" => "Orders@bills",
        "admin/orders/cancellation-and-refund" => "Orders@cancellation",
        "admin/orders/basket-reminder" => "Orders@reminder",
        "admin/b2b/orders" => "B2b@main",
        "admin/b2b/orders/:slug" => "B2b@details",
        "admin/b2b/payments" => "B2b@payments",
        "admin/b2b/invoices" => "B2b@bills",
        "admin/b2b/cancellation-and-refund" => "B2b@cancellation",
        "admin/catalog" => "Catalog@main",
        "admin/catalog/products/new" => "Catalog@newProduct",
        "admin/catalog/products/edit/:slug" => "Catalog@editProduct",
        "admin/catalog/products/edit/" => "Catalog@main",
        "admin/catalog/categories" => "Catalog@categories",
        "admin/catalog/brands" => "Catalog@brands",
        "admin/catalog/filters" => "Catalog@filters",
        "admin/catalog/tags" => "Catalog@tags",
        "admin/marketing/coupons" => "Marketing@coupons",
        "admin/marketing/campaigns" => "Marketing@campaigns",
        "admin/marketing/newsletter" => "Marketing@newsletter",
        "admin/marketing/comments" => "Marketing@comments",
        "admin/marketing/google-ads" => "Marketing@googleAds",
        "admin/marketing/meta-ads" => "Marketing@metaAds",
        "admin/customers/customers" => "Customers@customers",
        "admin/customers/b2b-customers" => "Customers@b2bCustomers",
        "admin/theme-settings" => "ThemeSettings@main",
        "admin/theme-settings/general-settings" => "ThemeSettings@generalSettings",
        "admin/theme-settings/paint-settings" => "ThemeSettings@paintSettings",
        "admin/theme-settings/content-settings" => "ThemeSettings@contentSettings",
        "admin/theme-settings/slider-settings" => "ThemeSettings@sliderSettings",
        "admin/theme-settings/banner-settings" => "ThemeSettings@bannerSettings",
        "admin/theme-settings/footer-settings" => "ThemeSettings@footerSettings",
        "admin/design-settings/menu-settings" => "DesignSettings@menuSettings",
        "admin/design-settings/menu-settings/edit/:slug/" => "DesignSettings@editMenuSettings",
        "admin/design-settings/slider-settings" => "DesignSettings@sliderSettings",
        "admin/design-settings/slider-settings/new-slider" => "DesignSettings@newSlider",
        "admin/design-settings/slider-settings/edit-slider/:slug/" => "DesignSettings@editSlider",
        "admin/api/slider-delete" => "DesignSettings@deleteSlider",
        "admin/contents/blogs" => "Contents@blogs",
        "admin/contents/blogs/new" => "Contents@newBlog",
        "admin/contents/frequently-asked-questions" => "Contents@Faq",
        "admin/api/delete-media" => "Api@deleteMedia",
        "admin/api/orders" => "Api@orders",
        "admin/api/products" => "Api@products",
        "admin/api/categories" => "Api@categories",
        "admin/api/brands" => "Api@brands",
        "admin/api/filters" => "Api@filters",
        "admin/api/tags" => "Api@tags",
        "admin/api/coupons" => "Api@coupons",
        "admin/api/newsletter" => "Api@newsletter",
        "admin/api/bills" => "Api@bills",
        "admin/api/cancellation" => "Api@cancellation",
        "admin/api/reminder" => "Api@reminder",
        "admin/api/payments" => "Api@payments",
        "admin/api/comments" => "Api@comments",
        "admin/api/first-and-only" => "Api@firstAndOnly",
        "admin/api/getModal" => "Api@getModal",
        "admin/api/faq" => "Api@faq",
        "admin/api/campaigns" => "Api@campaigns",
        "admin/api/getToken" => "Api@getToken",
        "admin/api/my-account-pp-update" => "Api@myAccountPpUpdate",
        "admin/api/currencies" => "Api@currencies",
        "admin/api/categoryDetail" => "Api@categoryDetail",
        "admin/api/newCategory" => "Api@newCategory",
        "admin/api/deleteCategory" => "Api@deleteCategory",
        "admin/api/editCategory" => "Api@editCategory",
        "admin/api/newFilter" => "Api@newFilter",
        "admin/api/deleteFilter" => "Api@deleteFilter",
        "admin/api/filterDetail" => "Api@filterDetail",
        "admin/api/filterEdit" => "Api@filterEdit",
        "admin/api/newBrand" => "Api@newBrand",
        "admin/api/deleteBrand" => "Api@deleteBrand",
        "admin/api/brandDetail" => "Api@brandDetail",
        "admin/api/editBrand" => "Api@editBrand",
        "admin/api/newCoupon" => "Api@newCoupon",
        "admin/api/deleteCoupon" => "Api@deleteCoupon",
        "admin/api/couponDetail" => "Api@couponDetail",
        "admin/api/editCoupon" => "Api@editCoupon",
        "admin/api/newFaq" => "Api@newFaq",
        "admin/api/deleteFaq" => "Api@deleteFaq",
        "admin/api/faqDetail" => "Api@faqDetail",
        "admin/api/editFaq" => "Api@editFaq",
        "admin/api/productDelete" => "Api@productDelete",
        "admin/api/new-campaign" => "Api@newCampaign",
        "admin/api/edit-campaign" => "Api@editCampaign",
        "admin/api/deleteCampaign" => "Api@deleteCampaign",
        "admin/api/campaignDetail" => "Api@campaignDetail",
        "admin/api/pages" => "Api@pages",
        "admin/api/delete-page" => "Api@deletePage",
        "admin/catalog/pages/edit-page/:slug" => "Contents@editPage",
        "admin/contents/pages" => "Contents@pages",
        "admin/contents/pages/new-page" => "Contents@newPage",
        "admin/api/new-media" => "Api@newMedia",
        "admin/api/dashboard-search" => "Api@dashboardSearch",
        "admin/api/component/:slug/:slug" => "Component@main",
        "admin/api/interfaces" => 'Api@interfaces',
        "admin/web-builder" => "Builder@main",
        "admin/web-builder/canvas/:slug/:slug/:slug" => "Builder@canvas",
        "admin/app/mail" => "Apps@mail",
        "admin/api/sliders" => "Api@sliders",
        "admin/api/taxes" => "Api@taxes",
        "admin/api/get-area" => "Api@getArea",
        "admin/settings/system-settings/seo-and-domain" => 'SystemSettings@seoAndDomain',
        "admin/settings/system-settings" => "Setting@systemSettings",
        "admin/settings/system-settings/corporate-information" => "SystemSettings@corporateInformation",
        "admin/settings/system-settings/tax-settings" => "SystemSettings@taxSettings",
        "admin/settings/system-settings/seo-and-domain/manage-domains" => "SystemSettings@manageDomains",
        "admin/settings/payment-settings" => "Setting@paymentSettings",
        "admin/api/add-payment-method" => "Api@addPaymentMethod",
        "admin/api/payment-delete" => "Api@paymentDelete"
    ],
];