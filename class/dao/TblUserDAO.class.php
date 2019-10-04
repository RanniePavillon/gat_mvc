<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-11-10 07:23
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

	public function queryByFirstName($value);

	public function queryByMiddleInitial($value);

	public function queryByLastName($value);

	public function queryByEmailAddress($value);

	public function queryByContactNumber($value);

	public function queryByAppliedPosition($value);

	public function queryByDateCreated($value);

	public function queryByDateModified($value);


	public function deleteByFirstName($value);

	public function deleteByMiddleInitial($value);

	public function deleteByLastName($value);

	public function deleteByEmailAddress($value);

	public function deleteByContactNumber($value);

	public function deleteByAppliedPosition($value);

	public function deleteByDateCreated($value);

	public function deleteByDateModified($value);


}
?>