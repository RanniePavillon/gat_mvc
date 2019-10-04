<?php
	//include all DAO files
	require_once('class/sql/Connection.class.php');
	require_once('class/sql/ConnectionFactory.class.php');
	require_once('class/sql/ConnectionProperty.class.php');
	require_once('class/sql/QueryExecutor.class.php');
	require_once('class/sql/Transaction.class.php');
	require_once('class/sql/SqlQuery.class.php');
	require_once('class/core/ArrayList.class.php');
	require_once('class/dao/DAOFactory.class.php');
 	
	require_once('class/dao/TblAdminDAO.class.php');
	require_once('class/dto/TblAdmin.class.php');
	require_once('class/mysql/TblAdminMySqlDAO.class.php');
	require_once('class/mysql/ext/TblAdminMySqlExtDAO.class.php');
	require_once('class/dao/TblAnswerDAO.class.php');
	require_once('class/dto/TblAnswer.class.php');
	require_once('class/mysql/TblAnswerMySqlDAO.class.php');
	require_once('class/mysql/ext/TblAnswerMySqlExtDAO.class.php');
	require_once('class/dao/TblAnswerTransactionDAO.class.php');
	require_once('class/dto/TblAnswerTransaction.class.php');
	require_once('class/mysql/TblAnswerTransactionMySqlDAO.class.php');
	require_once('class/mysql/ext/TblAnswerTransactionMySqlExtDAO.class.php');
	require_once('class/dao/TblQuestionDAO.class.php');
	require_once('class/dto/TblQuestion.class.php');
	require_once('class/mysql/TblQuestionMySqlDAO.class.php');
	require_once('class/mysql/ext/TblQuestionMySqlExtDAO.class.php');
	require_once('class/dao/TblScoreDAO.class.php');
	require_once('class/dto/TblScore.class.php');
	require_once('class/mysql/TblScoreMySqlDAO.class.php');
	require_once('class/mysql/ext/TblScoreMySqlExtDAO.class.php');
	require_once('class/dao/TblUserDAO.class.php');
	require_once('class/dto/TblUser.class.php');
	require_once('class/mysql/TblUserMySqlDAO.class.php');
	require_once('class/mysql/ext/TblUserMySqlExtDAO.class.php');

?>