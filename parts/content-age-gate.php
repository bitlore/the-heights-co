<div id="age-gate-overlay" class="age-gate-overlay"></div>
<section id="age-gate" class="age-gate">
    <div class="age-gate-inner">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/the-heights-h-white.svg" alt="THC Logo">
        <p class="title">THE HEIGHTS CO<p>
        <!-- <p class="title">THANKS FOR<br />STOPPING BY!<p> -->
        <p>ARE YOU AT LEAST 21?</p>
        <div class="buttons">
            <button onclick="hideAgeGate()" onmousedown="hideAgeGate()" id="age-gate-confirm" class="ghost age-gate-button" name="Confirm" title="I am 21">YES</button>
            <button id="age-gate-deny" class="ghost age-gate-button" name="Deny" title="I am not 21">NO</button>
        </div>
    </div>
</section>
