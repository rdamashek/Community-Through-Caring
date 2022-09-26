
<script>
	var imgs = Array.from(document.querySelectorAll('img'));

	imgs.forEach(function(img) {
		img.addEventListener('error', function handleError() {
			const defaultImage =
				'<?php echo base_url('assets/images/noimg.png'); ?>';

			img.style.filter='saturate(0.5)';
			img.src = defaultImage;
			img.alt = 'default';
		});
	})
</script>


<!--<footer><span style="color: #999;" >Copyrights &copy; 2022. Designed & Developed by Lipsum Technologies &reg; Pvt Ltd</span></footer>-->
</body>
</html>
