<div class="column">

    <div class="dk_website dk_hide_small" data-open="<?php echo $web['modal_name'] ?>">
        <img class="dk_work_img" src="img/screenshots/<?php echo $web['screenshot'] ?>" alt="<?php echo $web['screenshot_alt'] ?>">
        <div class="dk_work_caption">
            <h3><?php echo $web['title'] ?></h3>
            <h5><?php echo $web['category'] ?></h5>
            <a class="dk_btn" data-open="<?php echo $web['modal_name'] ?>">View Project Details</a>
        </div>
    </div>
    <div class="dk_website_small dk_hide_medium_up">
        <a data-open="<?php echo $web['modal_name'] ?>">
            <img class="dk_work_img_small" src="img/screenshots/<?php echo $web['screenshot'] ?>" alt="<?php echo $web['screenshot_alt'] ?>">
        </a>
        <h3><?php echo $web['title'] ?></h3>
    </div>
</div>

<!-- Modal -->
<div class="reveal dk_project_modal" id="<?php echo $web['modal_name'] ?>" data-reveal>
    <div class="dk_modal_top">
        <img src="img/showcase/<?php echo $web['showcase_img'] ?>" alt="Showcase image for <?php echo $web['title'] ?> website">
    </div><!--
    --><div class="dk_modal_bottom">
        <h3><?php echo $web['title']?></h3>
        <h4><a href="<?php echo $web['url'] ?>" target="_blank"><?php echo $web['pretty-url'] ?></a></h4>
        <h4>Website Goals</h4>
        <div class="dk_services">
            <ul class="dk_list">
                <?php foreach($web['goals'] as $goal) {
                    echo '<li>- ' . $goal . '</li>';
                }?>
            </ul>
        </div>
        <h4>Technologies Used</h4>
        <div class="row small-up-4 dk_tech">
            <?php foreach($web['tech'] as $tech => $tech_title) {
                echo '<div class="column"><img src="img/technologies/' . $tech . '.jpg" alt="' . $tech .'" ><span>' . $tech_title . '</span></div>';
            }?>
        </div>
    </div>
    <button class="close-button" data-close aria-label="Close modal" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<!-- End Modal -->
