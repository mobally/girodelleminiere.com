<?php

klippe_mikado_get_single_post_format_html($blog_single_type);

do_action('klippe_mikado_after_article_content');

klippe_mikado_get_module_template_part('templates/parts/single/author-info', 'blog');

klippe_mikado_get_module_template_part('templates/parts/single/single-navigation', 'blog');

klippe_mikado_get_module_template_part('templates/parts/single/related-posts', 'blog', '', $single_info_params);

klippe_mikado_get_module_template_part('templates/parts/single/comments', 'blog');