<?php
/**
 * Created by PhpStorm.
 * User: Dominika
 * Date: 29/06/2018
 * Time: 15:18
 */ ?>

<section class="breadcrumbs top-accent top-accent--white">
    <div class="container">
        <div class="row">
            <div class="col">
                <div typeof="BreadcrumbList" vocab="http://schema.org/">
                    <?php if(function_exists('bcn_display'))
                    {
                        bcn_display();
                    }?>
                </div>
            </div>
        </div>
    </div>
</section>
