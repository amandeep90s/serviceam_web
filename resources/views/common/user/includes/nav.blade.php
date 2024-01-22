<nav class="menu">
  <div id="header">
    <div class="menu-item menu-one " id ="home">
      <a class="dis-column" href="{{ url('user/home') }}">
        <div class="dis-center"><i class="material-icons">home</i></div>
        <span>Home</span>
      </a>
    </div>
    <div class="menu-item menu-two" id ="history-detail">
      <a class="dis-column" href="{{ url('user/services/trips') }}">
        <div class="dis-center"><i class="material-icons">location_on</i></div>
        <span class=my-history-detail>My History</span>
      </a>
    </div>
    <div class="menu-item menu-three ">
      <a class="dis-column" href="{{ url('user/profile/general') }}">
        <div class="dis-center"><i class="material-icons">account_box</i></div>
        <span>Profile</span>
      </a>
    </div>
    <div class="menu-item menu-four">
      <a class="dis-column" href="{{ url('user/wallet') }}">
        <div class="dis-center"><i class="material-icons">account_balance_wallet</i></div>
        <span>Wallet</span>
      </a>
    </div>
  </div>
</nav>
