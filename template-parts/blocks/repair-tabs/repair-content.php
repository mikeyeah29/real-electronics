<?php
$title = $args['title'] ?? 'Amplifier Repairs';
?>

<div class="d-flex gap-32">
                    
    <div class="w-md-66">

        <h3 class="has-lg-font-size pb-sm"><?php echo $title; ?></h3>
        <p>
            Professional repair and servicing for valve and solid-state guitar amplifiers.
        </p>
        <h3 class="has-lg-font-size pb-sm">Common issues we repair</h3>
        <ul class="has-sm-font-size mt-0">
            <li>No sound or intermittent output</li>
            <li>Crackling, popping, or hum</li>
            <li>Power issues and blown fuses</li>
            <li>Distortion faults or loss of gain</li>
            <li>Valve replacement and biasing</li>
        </ul>
        <h3 class="has-lg-font-size pb-sm">Why this matters</h3>
        <p>
            Guitar amps run at high voltages and need to be repaired safely and correctly. Our technicians diagnose faults accurately and use the correct components to ensure reliable performance.
        </p>
        <div class="pt-sm">
            <?php get_template_part('template-parts/components/button', '', array('link' => '#', 'text' => 'Book a Repair')); ?>
        </div>

    </div>
    <div class="w-md-33">
        <img src="https://placehold.co/600x400" alt="Amplifier Repair" class="square">
    </div>
</div>