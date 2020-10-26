function prettyfi_url() {
	let target = document.getElementById(this.getAttribute('pretty-url'));

	let url = this.value
		.toString()
		.toLowerCase()
		.normalize('NFD')
		.replace(/[\u0300-\u036f]/g, '')
		.replace(/\s+/g, '-')
		.replace(/[^\w\-]+/g, '')
		.replace(/\-\-+/g, '-')
		.replace(/^-+/, '')
		.replace(/-+$/, '');

	target.value = url;
}

document.querySelectorAll('[pretty-url]').forEach((elm) => {
	elm.addEventListener('change', prettyfi_url);
	elm.addEventListener('keyup', prettyfi_url);
	elm.addEventListener('touchup', prettyfi_url);
});
