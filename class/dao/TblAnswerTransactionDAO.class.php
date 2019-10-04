<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-11-10 07:23
 */
interface TblAnswerTransactionDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TblAnswerTransaction 
	 */
	public function load($id);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param tblAnswerTransaction primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblAnswerTransaction tblAnswerTransaction
 	 */
	public function insert($tblAnswerTransaction);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblAnswerTransaction tblAnswerTransaction
 	 */
	public function update($tblAnswerTransaction);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByUserId($value);

	public function queryByStatus($value);

	public function queryByDateCreated($value);

	public function queryByDateModified($value);


	public function deleteByUserId($value);

	public function deleteByStatus($value);

	public function deleteByDateCreated($value);

	public function deleteByDateModified($value);


}
?>