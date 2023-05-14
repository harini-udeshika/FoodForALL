 <?php $this->view('includes/header') ?>
 <link rel="stylesheet" href="<?= ROOT ?>/assets/akila_css/new_styles.css">
 <link rel="stylesheet" href="<?= ROOT ?>/assets/akila_css/reviews.css">
 <link rel="stylesheet" href="<?= ROOT ?>/assets/akila_css2/autoload.css">
 <?php $this->view('includes/navbar') ?>
 <?php $this->view('includes/submenu') ?>


 <div class="heading-1 col-12 p-bottom-10 p-top-30" style="float: left;">Reviews</div>

 <!-- contriner has grid applied and its max width is 1400px -->
 <div class="container ">

     <?php
        $i = 0;
        if ($allcoms) {
            $count = sizeof($allcoms);
            while ($count > 0) { ?>
             <!-- card is class whith shadows and borders -->
             <div class="card card-comment card-back1 col-lg-4 m-18 height-auto" style="max-width: 350px;">
                 <!-- row to seperate segments in class and, row has applied grid -->
                 <div class="row">
                     <!-- commentators photo -->
                     <img src="<?php echo $comment_data[$i]->profile_pic; ?>" class="commentator col-4" alt="User">
                     <!-- commentators details -->
                     <div class="col-8">
                         <div class="commentator-name txt-12 w-black"><?php echo $comment_data[$i]->first_name; ?></div>
                         <div class=" commentator-volunteer-level txt-11 w-medium p-left-1"><?php echo $comment_data[$i]->user_type; ?></div>
                         <div class=" commentator-volunteer-level txt-8 w-medium p-left-1">Commenting on:</div>
                         <div class=" commentator-volunteer-level txt-10 w-medium p-left-20" style="color: #6973AD;"><?php echo $comment_data[$i]->event_name; ?></div>
                         <div class=" commentator-volunteer-level txt-8 w-medium p-left-1">Rating : <span style="color: #6973AD;"><?php echo $comment_data[$i]->star_rate; ?>/5</span></div>
                         <div class=" comment-time txt-10 w-medium p-top-5"><?php echo $comment_data[$i]->date_time; ?></div>
                     </div>
                 </div>
                 <!-- row segment for comment -->
                 <div class="row-flex jf-center p-top-5 p-bottom-5">

                     <div class="comment-txt txt-8 p-top-10 p-bottom-5 height-100px" style="overflow: auto;">
                         <?php echo $comment_data[$i]->comment; ?>
                     </div>
                 </div>
                 <hr>
                 <!-- reply submit form -->
                 <form method="post" action="<?= ROOT ?>/reply_reviews?id=<?= $comment_data[$i]->comment_id ?>">
                     <div class="txt-11 w-semibold p-top-15">Reply</div>
                     <div class="row-flex p-top-12 p-bottom-12">
                         <textarea type="text" name="reply" id="" class="input-reply txt-12" style="width:100%; text-align:left; overflow: auto;"><?php if (isset($comment_data[$i]->reply)) {
                                                                                                                                        echo $comment_data[$i]->reply;
                                                                                                                                    } ?></textarea>
                     </div>
                     <button class="btn btn-sm btn-green float-right" type="submit">Post</button>
                 </form>
             </div>
         <?php
                $count--;
                $i++;
            }
        } else { ?>
         <hr class="width-100 col-12" style="border: 1px solid black">
         <div class="heading-2 col-12 height-600px">No Reviews recived</div>
     <?php
        }
        ?>

 </div>

 <?php $this->view('includes/footer') ?>