<?php
/**
 * Technical SEO helpers for Stotage.
 *
 * @package Case-Themes
 */

if ( ! function_exists( 'stotage_seo_has_external_plugin' ) ) {
    function stotage_seo_has_external_plugin() {
        $has_external_plugin = (
            defined( 'WPSEO_VERSION' ) ||
            defined( 'RANK_MATH_VERSION' ) ||
            defined( 'SEOPRESS_VERSION' ) ||
            defined( 'AIOSEO_VERSION' ) ||
            class_exists( 'WPSEO_Frontend' ) ||
            class_exists( 'RankMath' ) ||
            class_exists( 'AIOSEO\\Plugin\\AIOSEO' ) ||
            class_exists( 'The_SEO_Framework\\Load' )
        );

        return (bool) apply_filters( 'stotage_seo_has_external_plugin', $has_external_plugin );
    }
}

if ( ! function_exists( 'stotage_seo_defaults' ) ) {
    function stotage_seo_defaults() {
        $site_name = wp_strip_all_tags( get_bloginfo( 'name' ) );

        $defaults = array(
            'site_name'        => $site_name,
            'service_city'     => 'Ankara',
            'service_country'  => 'TR',
            'home_title'       => sprintf( '%s | Ankara Reklam Ajansi & Sosyal Medya Ajansi', $site_name ),
            'home_description' => 'Kufi Medya; Ankara reklam ajansi, sosyal medya yonetimi, Meta reklam ve SEO hizmetleri ile markalarin dijitalde gorunurlugunu ve donusumlerini buyutur.',
            'business_type'    => 'ProfessionalService',
        );

        return apply_filters( 'stotage_seo_defaults', $defaults );
    }
}

if ( ! function_exists( 'stotage_seo_normalize_text' ) ) {
    function stotage_seo_normalize_text( $text ) {
        $text = wp_strip_all_tags( (string) $text, true );
        $text = preg_replace( '/\s+/u', ' ', $text );

        return trim( (string) $text );
    }
}

if ( ! function_exists( 'stotage_seo_trim_description' ) ) {
    function stotage_seo_trim_description( $text ) {
        $text = stotage_seo_normalize_text( $text );

        if ( '' === $text ) {
            return '';
        }

        if ( function_exists( 'mb_strlen' ) && function_exists( 'mb_substr' ) ) {
            if ( mb_strlen( $text, 'UTF-8' ) > 160 ) {
                $text = rtrim( mb_substr( $text, 0, 157, 'UTF-8' ) ) . '...';
            }
        } elseif ( strlen( $text ) > 160 ) {
            $text = rtrim( substr( $text, 0, 157 ) ) . '...';
        }

        return $text;
    }
}

if ( ! function_exists( 'stotage_seo_get_description' ) ) {
    function stotage_seo_get_description() {
        $defaults = stotage_seo_defaults();

        if ( is_front_page() || ( is_home() && ! is_paged() ) ) {
            return stotage_seo_trim_description( $defaults['home_description'] );
        }

        if ( is_singular() ) {
            $description = get_the_excerpt();

            if ( '' === trim( (string) $description ) ) {
                $post = get_post();
                if ( $post instanceof WP_Post ) {
                    $description = $post->post_content;
                }
            }

            if ( '' !== trim( (string) $description ) ) {
                return stotage_seo_trim_description( $description );
            }
        }

        if ( is_category() || is_tag() || is_tax() ) {
            $term = get_queried_object();
            if ( $term instanceof WP_Term && ! empty( $term->description ) ) {
                return stotage_seo_trim_description( $term->description );
            }
        }

        if ( is_post_type_archive() ) {
            $post_type = get_query_var( 'post_type' );
            if ( is_array( $post_type ) ) {
                $post_type = reset( $post_type );
            }

            if ( is_string( $post_type ) && '' !== $post_type ) {
                $post_type_object = get_post_type_object( $post_type );
                if ( $post_type_object && ! empty( $post_type_object->description ) ) {
                    return stotage_seo_trim_description( $post_type_object->description );
                }
            }
        }

        $tagline = get_bloginfo( 'description' );
        if ( '' !== trim( (string) $tagline ) ) {
            return stotage_seo_trim_description( $tagline );
        }

        return stotage_seo_trim_description( $defaults['home_description'] );
    }
}

if ( ! function_exists( 'stotage_seo_get_image_url' ) ) {
    function stotage_seo_get_image_url() {
        if ( is_singular() && has_post_thumbnail() ) {
            $featured_image_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
            if ( $featured_image_url ) {
                return $featured_image_url;
            }
        }

        $custom_logo_id = get_theme_mod( 'custom_logo' );
        if ( $custom_logo_id ) {
            $custom_logo_url = wp_get_attachment_image_url( $custom_logo_id, 'full' );
            if ( $custom_logo_url ) {
                return $custom_logo_url;
            }
        }

        $logo_mobile = stotage()->get_opt(
            'logo_m',
            array(
                'url' => '',
                'id'  => '',
            )
        );

        if ( is_array( $logo_mobile ) && ! empty( $logo_mobile['url'] ) ) {
            return $logo_mobile['url'];
        }

        $logo_secondary = stotage()->get_theme_opt(
            'logo_s',
            array(
                'url' => '',
                'id'  => '',
            )
        );

        if ( is_array( $logo_secondary ) && ! empty( $logo_secondary['url'] ) ) {
            return $logo_secondary['url'];
        }

        return '';
    }
}

if ( ! function_exists( 'stotage_seo_current_url' ) ) {
    function stotage_seo_current_url() {
        if ( is_front_page() ) {
            return home_url( '/' );
        }

        if ( is_home() && ! is_front_page() ) {
            $posts_page_id = (int) get_option( 'page_for_posts' );
            if ( $posts_page_id > 0 ) {
                return get_permalink( $posts_page_id );
            }
        }

        if ( is_singular() ) {
            return get_permalink();
        }

        if ( is_search() ) {
            return get_search_link();
        }

        if ( is_archive() || is_author() || is_date() ) {
            $paged = max( 1, (int) get_query_var( 'paged' ), (int) get_query_var( 'page' ) );
            return get_pagenum_link( $paged );
        }

        return home_url( '/' );
    }
}

add_filter( 'pre_get_document_title', 'stotage_seo_front_page_title', 20 );
if ( ! function_exists( 'stotage_seo_front_page_title' ) ) {
    function stotage_seo_front_page_title( $title ) {
        if ( is_admin() || stotage_seo_has_external_plugin() ) {
            return $title;
        }

        if ( ! is_front_page() ) {
            return $title;
        }

        $defaults = stotage_seo_defaults();

        return $defaults['home_title'];
    }
}

add_filter( 'wp_robots', 'stotage_seo_robots_directives', 20 );
if ( ! function_exists( 'stotage_seo_robots_directives' ) ) {
    function stotage_seo_robots_directives( $robots ) {
        if ( stotage_seo_has_external_plugin() ) {
            return $robots;
        }

        if ( ! is_array( $robots ) ) {
            $robots = array();
        }

        $robots['max-image-preview'] = 'large';
        $robots['max-snippet']       = -1;
        $robots['max-video-preview'] = -1;

        if ( is_search() || is_404() ) {
            unset( $robots['index'], $robots['follow'] );
            $robots['noindex']  = true;
            $robots['nofollow'] = true;
            return $robots;
        }

        if ( is_paged() && ! is_singular() ) {
            unset( $robots['index'], $robots['nofollow'] );
            $robots['noindex'] = true;
            $robots['follow']  = true;
            return $robots;
        }

        unset( $robots['noindex'], $robots['nofollow'] );
        $robots['index']  = true;
        $robots['follow'] = true;

        return $robots;
    }
}

add_action( 'wp_head', 'stotage_seo_meta_tags', 2 );
if ( ! function_exists( 'stotage_seo_meta_tags' ) ) {
    function stotage_seo_meta_tags() {
        if ( is_admin() || is_feed() || is_trackback() || stotage_seo_has_external_plugin() ) {
            return;
        }

        if ( function_exists( 'is_robots' ) && is_robots() ) {
            return;
        }

        $defaults      = stotage_seo_defaults();
        $title         = wp_get_document_title();
        $description   = stotage_seo_get_description();
        $current_url   = stotage_seo_current_url();
        $canonical_url = '';
        $image_url     = stotage_seo_get_image_url();
        $locale        = str_replace( '_', '-', get_locale() );
        $og_type       = is_singular() ? 'article' : 'website';

        if ( '' === trim( (string) $title ) ) {
            $title = $defaults['home_title'];
        }

        if ( ! is_singular() && ! is_404() ) {
            $canonical_url = $current_url;
        }
        ?>
        <meta name="description" content="<?php echo esc_attr( $description ); ?>" />
        <?php if ( ! empty( $canonical_url ) ) : ?>
            <link rel="canonical" href="<?php echo esc_url( $canonical_url ); ?>" />
        <?php endif; ?>
        <meta property="og:locale" content="<?php echo esc_attr( $locale ); ?>" />
        <meta property="og:type" content="<?php echo esc_attr( $og_type ); ?>" />
        <meta property="og:title" content="<?php echo esc_attr( $title ); ?>" />
        <meta property="og:description" content="<?php echo esc_attr( $description ); ?>" />
        <meta property="og:url" content="<?php echo esc_url( $current_url ); ?>" />
        <meta property="og:site_name" content="<?php echo esc_attr( $defaults['site_name'] ); ?>" />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:title" content="<?php echo esc_attr( $title ); ?>" />
        <meta name="twitter:description" content="<?php echo esc_attr( $description ); ?>" />
        <?php if ( ! empty( $image_url ) ) : ?>
            <meta property="og:image" content="<?php echo esc_url( $image_url ); ?>" />
            <meta name="twitter:image" content="<?php echo esc_url( $image_url ); ?>" />
        <?php endif; ?>
        <?php
    }
}

add_action( 'wp_head', 'stotage_seo_front_page_schema', 35 );
if ( ! function_exists( 'stotage_seo_front_page_schema' ) ) {
    function stotage_seo_front_page_schema() {
        if ( is_admin() || ! is_front_page() || stotage_seo_has_external_plugin() ) {
            return;
        }

        $defaults = stotage_seo_defaults();
        $site_url = trailingslashit( home_url( '/' ) );
        $logo_url = stotage_seo_get_image_url();
        $same_as  = apply_filters( 'stotage_seo_same_as', array() );

        if ( ! is_array( $same_as ) ) {
            $same_as = array();
        }

        $same_as = array_values(
            array_filter(
                array_map( 'esc_url_raw', $same_as )
            )
        );

        $organization = array(
            '@type'       => $defaults['business_type'],
            '@id'         => $site_url . '#organization',
            'name'        => $defaults['site_name'],
            'url'         => $site_url,
            'description' => $defaults['home_description'],
            'address'     => array(
                '@type'           => 'PostalAddress',
                'addressLocality' => $defaults['service_city'],
                'addressCountry'  => $defaults['service_country'],
            ),
            'areaServed'  => array(
                '@type' => 'City',
                'name'  => $defaults['service_city'],
            ),
        );

        if ( ! empty( $logo_url ) ) {
            $organization['logo'] = array(
                '@type' => 'ImageObject',
                'url'   => $logo_url,
            );
        }

        if ( ! empty( $same_as ) ) {
            $organization['sameAs'] = $same_as;
        }

        $website = array(
            '@type'           => 'WebSite',
            '@id'             => $site_url . '#website',
            'url'             => $site_url,
            'name'            => $defaults['site_name'],
            'description'     => $defaults['home_description'],
            'publisher'       => array(
                '@id' => $site_url . '#organization',
            ),
            'inLanguage'      => get_bloginfo( 'language' ),
            'potentialAction' => array(
                '@type'       => 'SearchAction',
                'target'      => $site_url . '?s={search_term_string}',
                'query-input' => 'required name=search_term_string',
            ),
        );

        $webpage = array(
            '@type'       => 'WebPage',
            '@id'         => $site_url . '#webpage',
            'url'         => $site_url,
            'name'        => wp_get_document_title(),
            'description' => $defaults['home_description'],
            'isPartOf'    => array(
                '@id' => $site_url . '#website',
            ),
            'about'       => array(
                '@id' => $site_url . '#organization',
            ),
            'inLanguage'  => get_bloginfo( 'language' ),
        );

        $structured_data = array(
            '@context' => 'https://schema.org',
            '@graph'   => array(
                $organization,
                $website,
                $webpage,
            ),
        );
        ?>
        <script type="application/ld+json"><?php echo wp_json_encode( $structured_data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ); ?></script>
        <?php
    }
}
