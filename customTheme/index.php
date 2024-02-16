<!DOCTYPE HTML>
<!--
    Striped by HTML5 UP
    html5up.net | @ajlkn
    Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
    <title>Striped by HTML5 UP</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <!-- <link rel="stylesheet" href="./style.css" /> -->
    <?php wp_head(); ?>

</head>

<body class="is-preload">

    <div id="content">
        <div class="inner">

            <?php if (have_posts()):
                while (have_posts()):
                    the_post(); ?>
                    <article class="box post post-excerpt">
                        <header>
                            <h2><a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a></h2>
                            <p>
                                <?php the_excerpt(); ?>
                            </p>
                        </header>
                        <div class="info" id="Info">
                            <span class="date">
                                <?php the_date(); ?>
                            </span>
                        </div>
                        <?php
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('featured');
                        }
                        ?>
                        <!-- <p>
                            <?php /* the_content() */ ; ?>
                        </p> -->
                    </article>
                <?php endwhile; else: ?>
                <p>
                    <?php esc_html_e('No posts found'); ?>
                </p>
            <?php endif; ?>

            <!-- Pagination -->
            <div class="pagination">
                <!--<a href="#" class="button previous">Previous Page</a>-->
                <div class="pages">
                    <a href="#" class="active">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#">4</a>
                    <span>&hellip;</span>
                    <a href="#">20</a>
                </div>
                <a href="#" class="button next">Next Page</a>
            </div>

        </div>
    </div>

    <!-- Sidebar -->
    <div id="sidebar">

        <!-- Logo -->
        <h1 id="logo"><a href="#">LOGO</a></h1>

        <!-- Nav -->
        <nav id="nav">
            <ul>
                <li class="current"><a href="#">Latest Post</a></li>
                <li><a href="#">Archives</a></li>
                <li><a href="#">About Me</a></li>
                <li><a href="#">Contact Me</a></li>
            </ul>
        </nav>

        <!-- Search -->
        <section class="box search">
            <form method="post" action="#">
                <input type="text" class="text" name="search" placeholder="Search" />
            </form>
        </section>

        <!-- Text -->
        <section class="box text-style1">
            <div class="inner">
                <p>
                    <strong>Striped:</strong> A free and fully responsive HTML5 site
                    template designed by <a href="http://twitter.com/ajlkn">AJ</a> for <a
                        href="http://html5up.net/">HTML5 UP</a>
                </p>
            </div>
        </section>

        <!-- Recent Posts -->
        <section class="box recent-posts">
            <header>
                <h2>Recent Posts</h2>
            </header>
            <ul>
                <?php
                $recent_posts = new WP_Query(
                    array(
                        'post_type' => 'post',
                        'posts_per_page' => 5, // Change this to the number of posts you want to display
                        'orderby' => 'date',
                        'order' => 'DESC'
                    )
                );

                while ($recent_posts->have_posts()):
                    $recent_posts->the_post();
                    ?>
                    <li><a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a></li>
                    <?php
                endwhile;
                wp_reset_postdata(); // Reset the global post object
                ?>
            </ul>
        </section>

        <!-- Recent Comments -->
        <section class="box recent-comments">
            <header>
                <h2>Recent Comments</h2>
            </header>
            <ul>
                <?php
                $recent_comments = get_comments(
                    array(
                        'number' => 5, // Change this to the number of comments you want to display
                        'status' => 'approve' // Only show approved comments
                    )
                );

                if ($recent_comments) {
                    foreach ($recent_comments as $comment) {
                        $post_title = get_the_title($comment->comment_post_ID);
                        echo '<li>' . $comment->comment_author . ' on <a href="' . get_permalink($comment->comment_post_ID) . '">' . $post_title . '</a></li>';
                    }
                } else {
                    echo '<li>No recent comments</li>';
                }
                ?>
            </ul>
        </section>

        <!-- Calendar -->
        <section class="box calendar">
            <div class="inner">
                <table>
                    <caption>July 2014</caption>
                    <thead>
                        <tr>
                            <th scope="col" title="Monday">M</th>
                            <th scope="col" title="Tuesday">T</th>
                            <th scope="col" title="Wednesday">W</th>
                            <th scope="col" title="Thursday">T</th>
                            <th scope="col" title="Friday">F</th>
                            <th scope="col" title="Saturday">S</th>
                            <th scope="col" title="Sunday">S</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="4" class="pad"><span>&nbsp;</span></td>
                            <td><span>1</span></td>
                            <td><span>2</span></td>
                            <td><span>3</span></td>
                        </tr>
                        <tr>
                            <td><span>4</span></td>
                            <td><span>5</span></td>
                            <td><a href="#">6</a></td>
                            <td><span>7</span></td>
                            <td><span>8</span></td>
                            <td><span>9</span></td>
                            <td><a href="#">10</a></td>
                        </tr>
                        <tr>
                            <td><span>11</span></td>
                            <td><span>12</span></td>
                            <td><span>13</span></td>
                            <td class="today"><a href="#">14</a></td>
                            <td><span>15</span></td>
                            <td><span>16</span></td>
                            <td><span>17</span></td>
                        </tr>
                        <tr>
                            <td><span>18</span></td>
                            <td><span>19</span></td>
                            <td><span>20</span></td>
                            <td><span>21</span></td>
                            <td><span>22</span></td>
                            <td><a href="#">23</a></td>
                            <td><span>24</span></td>
                        </tr>
                        <tr>
                            <td><a href="#">25</a></td>
                            <td><span>26</span></td>
                            <td><span>27</span></td>
                            <td><span>28</span></td>
                            <td class="pad" colspan="3"><span>&nbsp;</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Copyright -->
        <ul id="copyright">
            <li>&copy; Untitled.</li>
            <li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
        </ul>

    </div>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>