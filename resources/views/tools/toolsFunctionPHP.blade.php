<?php 
// THIS PAGE WILL BRING ALL FUNCTIONS THAT THIS APP USES


//------------------------[DATA TABLE -> ACTIVE]---------------------
//FUNCTION TO ACTIVE
// 0 = DESATIVED
// 1 = ACTIVE
// 2 = CHOOSED BY
// 3 = DELIVERED
function active($active){
	switch ($active) {
		case 0:
			return '0 = Desatived';
			break;
		case 1:
			return '1 = Active';
			break;
		case 2:
			return '2 = Chosed by';
			break;
		case 3:
			return '3 = Delivered';
			break;
		default:
			return 'others';
			break;
	}
}
?>