<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-11-10 07:15
 */
interface TblUserDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TblUser 
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
 	 * @param tblUser primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblUser tblUser
 	 */
	public function insert($tblUser);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblUser tblUser
 	 */
	public function update($tblUser);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByUsername($value);

	public function queryByPassword($value);

	public function queryByDateCreated($value);

	public function queryByDateModified($value);


	public function deleteByUsername($value);

	public function deleteByPassword($value);

	public function deleteByDateCreated($value);

	public function deleteByDateModified($value);


}
?>