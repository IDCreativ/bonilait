<?php
$fields = get_fields();
?>
<div class="top-footer footer-wave-block">
    <?php
    if (isset($fields['page_footer']['footer_call_to_action']) && $fields['page_footer']['footer_call_to_action'] !== "") {
        ?>
        <div class="footer-call-to-action">
            <a
				class="btn btn-secondary btn-lg text-light text-uppercase"
                href="<?php echo isset($fields['page_footer']['footer_call_to_action']['url']) ? $fields['page_footer']['footer_call_to_action']['url'] : ""; ?>"
                target="<?php echo isset($fields['page_footer']['footer_call_to_action']['target']) ? $fields['page_footer']['footer_call_to_action']['target'] : ""; ?>"
                title="<?php echo isset($fields['page_footer']['footer_call_to_action']['title']) ? $fields['page_footer']['footer_call_to_action']['title'] : ""; ?>"
            >
                <?php echo isset($fields['page_footer']['footer_call_to_action']['title']) ? $fields['page_footer']['footer_call_to_action']['title'] : ""; ?>
            </a>
        </div>
        <?php
    }
    ?>

    <svg
        class="wave-block"
        data-name="wave-block"
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 1600 118.21"
    >
        <path
            class="wave-primary"
            d="M1600,111.41c-90.39,5.4-181.22,2.65-272.18-3.64C1120.34,93.22,912.08,61,702.17,38.42,649.68,33,597.1,27.6,544.42,23.23c-52.7-3.91-105.48-7.8-158.38-9.54s-105.87-2.73-158.88-1Q147.65,14.67,68.17,24,34.07,28.12,0,33.85V130H1600Z"
        />
    </svg>
</div>