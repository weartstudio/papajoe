const address_field = document.querySelectorAll('.form-row.address-field');
address_field.forEach(element => {
	element.classList.add('form-row-first');
});

const open_close_mobile = () => {
	const navbar = document.getElementById('main-nav-ul');
	if( navbar.style.display === 'flex' ){
		navbar.style.display = 'none';
	}else{
		navbar.style.display = 'flex';
	}
}