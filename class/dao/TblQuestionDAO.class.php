<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-11-10 07:23
 */
interface TblQuestionDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TblQuestion 
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
 	 * @param tblQuestion primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblQuestion tblQuestion
 	 */
	public function insert($tblQuestion);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblQuestion tblQuestion
 	 */
	public function update($tblQuestion);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByQuestion($value);

	public function queryByLowerRate($value);

	public function queryByHigherRate($value);

	public function queryByDateCreated($value);

	public function queryByDateModified($value);


	public function deleteByQuestion($value);

	public function deleteByLowerRate($value);

	public function deleteByHigherRate($value);

	public function deleteByDateCreated($value);

	public function deleteByDateModified($value);


}
?>