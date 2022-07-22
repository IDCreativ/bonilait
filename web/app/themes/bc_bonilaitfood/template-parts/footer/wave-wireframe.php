<?php
$fields = get_fields();
?>
<div class="top-footer footer-wave-wireframe">
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
		class="wave-wireframe"
		data-name="wave-wireframe"
		xmlns="http://www.w3.org/2000/svg"
		xmlns:xlink="http://www.w3.org/1999/xlink"
		viewBox="0 0 1600 110"
	>
		<g class="cls-2">
			<g 
				id="main-mask"
				data-name="main-mask"
			>
				<path
					id="wave-wireframe"
					data-name="wave-wireframe"
					class="cls-5"
					d="M1601,106.16q-28.08-1.43-56.18-3.39C1337.34,88.22,1129.08,56,919.17,33.42,866.68,28,814.1,22.6,761.42,18.23c-52.7-3.91-105.48-7.8-158.38-9.54S497.17,6,444.16,7.72q-79.52,2-159,11.24C189.05,30.68,92.86,51.13,0,88.54"
				/>
			</g>
		</g>
	</svg>
</div>