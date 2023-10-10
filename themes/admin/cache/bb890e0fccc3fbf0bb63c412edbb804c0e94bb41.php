<section class="py-20 pt-0">
    <div class="lg:bg-gray-50 bg-gray-100 lg:px-0 px-4">
        <div class="max-w-4xl mx-auto lg:py-24 py-10">
            <h1 class="lg:text-7xl text-4xl font-bold lg:mb-4 mb-2 text-gray-800"> <?php echo e($data['title']); ?> </h1>
            <?php if(isset($data['description'])): ?>
                <?php if($data['description'] !== ''): ?>
                    <p class="text-gray-500 lg:text-normal text-sm"><?php echo e($data['description']); ?></p>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</section><?php /**PATH /Users/bekir/Desktop/admin/themes/admin/views/web-builder/components/page-title/page-title-1/html.blade.php ENDPATH**/ ?>