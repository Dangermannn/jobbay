<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/chat.css">
    <title>Document</title>
</head>
<body>
    <?php include('public/templates/navbar.php'); ?>

    <div class="container">
        <?php

        echo '
        <div class="chat-container">
        <h3 class=" text-center">Messaging</h3>
        <div class="messaging">  
         <div class="inbox_msg">
        <div class="inbox_people">
          <div class="headind_srch">
            <div class="recent_heading">
              <h4>Recent</h4>
            </div>
            <div class="srch_bar">
              <div class="stylish-input-group">
                <input type="text" class="search-bar"  placeholder="Search" >
                <span class="input-group-addon">
                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                </span> </div>
            </div>
          </div>
          <div class="inbox_chat">';
          if(isset($users))
          {
            foreach($users as $person)
            {
              echo '
              <div class="chat_list">
              <div class="chat_people">
              <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
              <div class="chat_ib">
              <h5>'.$person->getEmail().'<span class="chat_date">Dec 25</span></h5>
              <p>Test, which is a new approach to have all solutions 
              astrology under one roof.</p>
              </div>
              </div>
              </div>';
            }
          }

        echo '
          </div>
        </div>
        <div class="mesgs">
          <div class="msg_history">
          ';
          if(isset($messages))
          {
            foreach($messages as $msg)
            {
              if($_SESSION['id'] == $msg->getSender())
              {
                echo '
                <div class="outgoing_msg">
                <div class="sent_msg">
                  <p>'.$msg->getContent().'</p>
                  <span class="time_date"> 11:01 AM    |    June 9</span> </div>
                </div>
                ';
              }
              else
              {
                echo '
                <div class="incoming_msg">
                <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="received_msg">
                  <div class="received_withd_msg">
                    <p>'.$msg->getContent().'</p>
                    <span class="time_date"> 11:01 AM    |    June 9</span></div>
                </div>
                </div>
                ';
              }
            }
          }

          echo '
          </div>
          <div class="type_msg">
            <div class="input_msg_write">
              <input type="text" class="write_msg" placeholder="Type a message" />
              <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
            </div>
          </div>
        </div>
      </div>
      </div>
        ';

    
        if(isset($messages))
        {
            foreach($messages as $msg)
            {
                echo '<h1>'.$msg->getContent().'</h1>';
            }
        }
        else
            echo '<h1>There are no messages!</h1>';
    
        ?>
    </div>

    <?php include('public/templates/footer.php'); ?>

    <script src="public/js/app.js"></script>
</body>
</html>