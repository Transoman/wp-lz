  </div><!-- /.content -->

  <footer class="footer">
    <div class="container">
      <p class="copy">© Лига Знаний, <?php echo date( 'Y' ); ?> год</p>

      <?php $policy = get_field( 'policy', 'option' );

      if ($policy['url']): ?>
        <a href="<?php echo esc_url( $policy['url'] ); ?>"><?php echo $policy['title']; ?></a>
      <?php endif; ?>
    </div>
  </footer><!-- #colophon -->

</div><!-- /.wrapper -->

<?php wp_footer(); ?>

</body>
</html>
