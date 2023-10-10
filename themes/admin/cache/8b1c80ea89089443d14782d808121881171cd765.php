<footer class="border-t border-t-blue-500 border-t-8">
    <div class="bg-white lg:pt-16 lg:pb-10 p-4">
        <!-- .flex items-start justify-between. -->
        <div class="mx-auto py-4 max-w-7xl px-2 grid lg:grid-cols-5 grid-cols-1 lg:gap-6 gap-6">
            <?php $__currentLoopData = $data['menu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <ul>
                    <li class="lg:mb-2 mb-1">
                        <a href="" class="lg:text-2xl text-xl font-bold text-gray-900"> <?php echo e($menu1['title']); ?> </a>
                    </li>
                    <?php $__currentLoopData = $menu1['menu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <a href="<?php echo e($menu2['url']); ?>" class="text-gray-500 text-sm"><?php echo e($menu2['title']); ?></a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <div class="bg-blue-500">
        <div class="mx-auto lg:py-4 py-2 max-w-7xl px-2 flex items-center justify-between lg:flex-row flex-col">
            <img class="" src="<?php echo e($data['logo']); ?>" alt="" style="height: 40px">
            <p class="block text-white lg:text-lg text-xs lg:pt-0 pt-2">
                <?php echo e($data['copyright']); ?>

            </p>
            <ul class="flex items-center lg:pt-0 pt-2">
                <?php $__currentLoopData = $data['social']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="mx-1">
                        <a href="<?php echo e($social['url']); ?>" class="text-white">
                            <i class="<?php echo e($social['icon']); ?>"></i>
                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
    <?php if($data['brand_bar']): ?>
    <div class="bg-blue-600">
        <div class="mx-auto lg:py-4 py-2 max-w-7xl px-2 flex items-center justify-center">
            <p class="flex items-center justify-center">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4665 12.4624L4.5866 13.112C4.01001 13.166 3.45772 13.0417 2.98511 12.7838C2.19651 12.3517 1.62938 11.551 1.5389 10.5895L0.889396 3.70961C0.82728 3.05335 0.997422 2.42815 1.3323 1.91637C1.78196 1.22906 2.53005 0.745639 3.41046 0.661918L10.2904 0.0124096C11.0263 -0.0564572 11.7231 0.164997 12.2659 0.584949C12.856 1.04136 13.2625 1.73273 13.3381 2.53348L13.9876 9.4134C14.0578 10.1642 13.8256 10.8745 13.3894 11.42C12.933 11.9952 12.2524 12.3882 11.4665 12.4624Z" fill="white"/>
                    <path d="M7.36644 9.68734H6.07822V8.23033H7.36644C7.79584 8.23033 7.96463 7.90355 8.00649 7.80363C8.04835 7.7037 8.15908 7.35262 7.85661 7.0488L6.75069 5.94287C6.26187 5.45541 6.11738 4.72758 6.38205 4.08887C6.64671 3.45152 7.26381 3.03832 7.95383 3.03832H8.28871V4.49667H7.95248C7.8107 4.49667 7.74993 4.59119 7.72698 4.64791C7.70402 4.70327 7.67971 4.814 7.77964 4.91392L8.88556 6.01984C9.51211 6.6464 9.69036 7.54302 9.35142 8.36267C9.01249 9.17962 8.25225 9.68734 7.36644 9.68734Z" fill="#4F46E5"/>
                </svg>
                <span class="ml-1 text-white text-xs"> Socore Dijital Sistemler </span>
            </p>
        </div>
    </div>
    <?php endif; ?>
</footer><?php /**PATH /Users/bekir/Desktop/admin/themes/admin/views/web-builder/components/footer/footer-1/html.blade.php ENDPATH**/ ?>