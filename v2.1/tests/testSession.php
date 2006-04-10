<?php


// chargements de base
require_once( '../release/lib/librairies.php' );


$session = Session::GetInstance();

echo 'Variable de session kikou sett� : '.intval( $session->IsSetVariable ( 'kikou' ) ).'<br />';
echo 'Variable de session kikou lue : '; echo $session->GetVariable( 'kikou' ); echo '<br />';

$usrGet = $session->GetVariable ( 'TestPasse' );
echo 'Get de la variable TestPasse : '; echo $usrGet; echo '<br />';


$usr = new User ( new BDDRecord() );
$usr->SetProperty ( TableUser::TABLE_COLUMN_NAME, 'cyrille2'.rand() );
//$usr->SetProperty ( TableUser::TABLE_COLUMN_NAME, $usrGet->GetProperty(TableUser::TABLE_COLUMN_NAME)  );
echo 'Set de la variable TestPasse : '; echo $session->SetVariable ( 'TestPasse', $usr ); echo '<br />';



echo '<a href="?'.rand().'">Lien de test</a><br /><br />';

?>
