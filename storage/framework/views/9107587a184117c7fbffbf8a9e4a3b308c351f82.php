<article class="mb-8">
    <header class="text-3xl font-extrabold mb-1">
        <h2>
            <a href="<?php echo e($post->slug); ?>" class="border-b-4 border-indigo-200 hover:text-white hover:bg-indigo-600 hover:border-indigo-600">
                <?php echo e($post->title); ?>

            </a>
        </h2>
    </header>

    <section class="text-gray-800 text-xl mb-2">
        <p><?php echo $post->excerpt; ?></p>
    </section>

    <footer>
        <small class="text-sm text-gray-700">
            <span title="<?php echo e($post->date->format('Y-m-d')); ?>"><?php echo e($post->date->format('F jS, Y')); ?></span> &mdash; 2 minutes
        </small>
    </footer>
</article>
<?php /**PATH /Users/sven/Code/github.com/svenluijten/svenluijten.com/resources/views/components/post-card.blade.php ENDPATH**/ ?>