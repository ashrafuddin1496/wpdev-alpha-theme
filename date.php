<?php get_header();?>
<body <?php body_class(); ?>>
<?php get_template_part('/template-parts/common/hero');?>
<div class="posts text-center">

    <h1>Posts In
        <?php
            if (is_month()){
                $month = get_query_var('monthnum');
                $dateobject= DateTime::createFromFormat('!m',$month);
                echo $dateobject->format('F');
            }elseif (is_year()){
                echo get_query_var('year');
            }elseif(is_day()){
               printf('%s/%s/%s',get_query_var('day'),get_query_var('monthnum'),get_query_var('year'));
            }
        ?>
    </h1>

    <?php while (have_posts()){
        the_post();
        ?>
        <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>

        <?php

    } ?>

    <div class="container post-paginate">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-8">
                <?php
                    the_posts_pagination(array(
                            'screen_reader_text'    => ' ',
                            'prev_text' =>'New Posts',
                            'next_text' =>'Old Posts'
                    ));
                ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer();?>