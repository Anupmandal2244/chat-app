<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <style>
    body {
      margin: 0;
      height: 100vh; /* full screen height */
      display: flex;
      justify-content: center; /* horizontal center */
      align-items: center; /* vertical center */
      background: #f8f9fa;
    }
    .card {
      width: 50rem;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      background: #fff;
    }
    .chat-list {
    list-style: none;
    margin: 0;
    padding: 0;
}

.card-body.height3 {
      height: 22rem; 
      overflow-y: auto;
      background: #f8f9fa;
    }

    .chat-list {
      list-style: none;
      margin: 0;
      padding: 0;
    }

    .chat-list li {
      margin-bottom: 15px;
      display: flex;
      align-items: flex-end;
    }

    .chat-img img {
      border-radius: 50%;
      width: 45px;
      height: 45px;
    }

    /* Incoming message (left) */
    .chat-list .in {
      justify-content: flex-start;
    }
    .chat-list .in .chat-message {
      background: #e9ecef;
      padding: 10px 15px;
      border-radius: 15px;
      max-width: 60%;
      margin-left: 10px;
    }

    /* Outgoing message (right) */
    .chat-list .out {
      justify-content: flex-end;
    }
    .chat-list .out .chat-message {
      background: #007bff;
      color: #fff;
      padding: 10px 15px;
      border-radius: 15px;
      max-width: 60%;
      margin-right: 10px;
      text-align: right;
    }

    .chat-time {
      font-size: 12px;
      display: block;
      margin-top: 5px;
      opacity: 0.7;
    }

    /* Input row styling */
    .chat-input {
      margin-top: 10px;
    }
  </style>
</head>
<body>
<div class="container">
   <div class="card" style="width: 50rem; height: 30rem;">
      <div class="card-body">
         <div class="card-header">Chat</div>
         <div class="card-body height3">
            <ul class="chat-list" id="chat-section">
                  <!-- <li class="out">
                     <div class="chat-img">
                        <img src="https://smartexam-mum.s3.amazonaws.com/Photo_Signature/makaut1/photo/makaut11733331016TS0453696.jpg" alt="img" height="50px">
                     </div>
                     <div class="chat-body">
                        <div class="chat-message">
                           <p>Hello, how are you?</p>
                           <span class="chat-time">10:00 AM</span>
                        </div>
                     </div>
                  </li> -->
            </ul>
         </div>
      </div>
  
   </div>
   <div class="row">
      <div class="col-lg-9">
         <input type="text" id="username" value="{{ $username }}" hidden/>
         <input type="text" id="chat_message" placeholder="write message here ..." class="form-control"/>   
      </div>
      <div class="col-lg-3">
         <button class="btn btn-primary" onclick="broadcastChat()">Send</button>
      </div>
   </div>
</div>
   
</body>
@vite('resources/js/app.js')
    <script>
      setTimeout(() => {
        window.Echo.channel('chat-message').listen('chat',(data)=>{
         if(data.username == $('#username').val()){
         newMessage = ` <li class="out">
                     <div class="chat-img">
                        <img src="https://smartexam-mum.s3.amazonaws.com/Photo_Signature/makaut1/photo/makaut11733331016TS0453696.jpg" alt="img" height="50px">
                     </div>
                     <div class="chat-body">
                        <div class="chat-message">
                           <h3>${data.username}</h3>
                           <p>${data.message}</p>
                        </div>
                     </div>
                  </li>`;
         }else{
            newMessage = ` <li class="in">
                     <div class="chat-img">
                        <img src="https://smartexam-mum.s3.amazonaws.com/Photo_Signature/makaut1/photo/makaut11733331016TS0453696.jpg" alt="img" height="50px">
                     </div>
                     <div class="chat-body">
                        <div class="chat-message">
                           <h3>${data.username}</h3>
                           <p>${data.message}</p>
                        </div>
                     </div>
                  </li>`;
         }
            console.log(data);
            $('#chat-section').append(newMessage);
        })
    }, 5000);

        function broadcastChat(){
        $.ajax({
            'headers':{
                'X-CSRF-TOKEN' : '{{csrf_token()}}'
            },
            url:'{{route('broadCastChat.chat')}}',
            type:'POST',
            data: {
               email: $('#username').val(),
               message: $('#chat_message').val()
            },
            success: function(result){
               //  console.log(result);
            },
            error: function(err){
                console.log(err);
            }
        });
    }
    
    </script>
</html>