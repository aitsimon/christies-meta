
<div id="profileWrpaper" class="container">
   <div id="userInfo" class=" d-flex flex-column my-5 py-5 justify-content-center align-items-start">
       <h1><?php echo $info['user']->getEmail()?></h1>
       <span class="text-success"><strong class="text-dark">Wallet: </strong><?php echo $info['user']->getTokens() ?> ₣</span>
       <span><strong>Telephone: </strong><?php echo $info['user']->getTelph() ?></span>
   </div>
    <div id="userPurchasedProducts" class="d-flex flex-column my-5 py-5 justify-content-center align-items-start">
        <h2>Products: </h2>
    </div>
</div>