<?php $userdata = $this->session->userdata(); ?>
<div id="menu" class="normal col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <ul>
                        <li><a href="<?php echo site_url('home') ?>" class="logo-web" style="padding: 0;"><img src="<?php echo base_url() ?>assets/img/revlogo.png" /></a></li>
                        <li><a href="<?php echo site_url('home') ?>">home</a></li>
                        <li><a href="<?php echo site_url('innovation') ?>">inovasi</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <form method="post" action="<?php echo site_url('search/search') ?>">
                        <input type="search" name="keyword" id="cari" placeholder="Cari disini..." />
                        <input type="submit" id="submit" value="Cari" />
                    </form>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                  <?php if ($this->session->userdata('user_id')): ?>
                    <ul>
                        <li><a href="<?php echo site_url('profile/me') ?>"><?php echo $this->session->userdata('name'); ?></a></li>
                        <li><a href="<?php echo site_url('home/logout') ?>">Logout</a></li>
                    </ul>
                  <?php else: ?>
                    <ul>
                        <li><a href="<?php echo site_url('about') ?>">about</a></li>
                        <li id="log">
                            <a href="">masuk | login</a>
                            <ul>
                                <li>
                                    <div class="form-login">
                                        <form method="post" action="<?php echo site_url('login/login') ?>" id="login">
                                            <input type="text" name="username" id="username" placeholder="Username..." />
                                            <input type="password" name="password" id="password" placeholder="Password..." /><br /><br />
                                            <div class="pull-left">
                                                <label for="password"><a href="">forget password?</a></label><br />
                                                <input type="checkbox" name="remember" />
                                                <label for="remember">remember me!</label>
                                            </div>
                                            <div class="pull-right">
                                                <input type="submit" value="Sign in" />
                                            </div>
                                            <div id="clear"></div>
                                        </form>
                                        <div class="sign-up">
                                            <p>butuh akun?</p>
                                            <center><a href="<?php echo site_url('register') ?>" id="sign-up">SIGN UP now!</a></center>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                  <?php endif; ?>
                </div>
            </div>
        </div>
</div>
