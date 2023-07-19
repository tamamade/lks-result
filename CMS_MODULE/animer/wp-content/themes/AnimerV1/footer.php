</main>
</div>
<footer id="footer">
    <div class="container">
        <div id="copyright">
            Copyright &copy; <?php echo esc_html(date_i18n(__('Y', 'blankslate'))); ?>
            - All rights reserved
        </div>
        <?php do_shortcode('[footer-icons]') ?>
    </div>
</footer>
</div>
<?php wp_footer(); ?>
</body>

</html>