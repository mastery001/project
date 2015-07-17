package datastructure.tree.impl;

import datastructure.tree.AbstractTree;
import datastructure.tree.Tree;
import datastructure.tree.TreeNode;

/**
 * 链式实现二叉树
 * @Description 
 * @author mastery
 * @Date 2015年7月16日下午8:54:27
 */
public class LinkedBinaryTree<T> extends AbstractTree<T>{
	
	
	/**
	 * 初始化根结点
	 * @param root
	 */
	public LinkedBinaryTree(TreeNode<T> root) {
		this.root = root;
	}
	
	public Tree<T> insertLeftNode(T data) {
		return this.insertLeftNode(root, data);
	}

	public Tree<T> insertRightNode(T data) {
		return this.insertRightNode(root, data);
	}
	
	/**
	 * 添加指定结点的左结点
	 * @param node 指定的结点
	 * @param data 需要添加的数据
	 * @return
	 */
	public LinkedBinaryTree<T> insertLeftNode(TreeNode<T> curr , T data) {
		if(curr == null) throw new NullPointerException(curr + " is null");
		
		return null;
	}

	/**
	 * 添加指定结点的右结点
	 * @param node 指定的结点
	 * @param data 需要添加的数据
	 * @return
	 */
	public LinkedBinaryTree<T> insertRightNode(TreeNode<T> curr , T data) {
		return null;
	}

	/**
	 * 删除指定结点的左结点
	 * @param node 指定的结点
	 * @return
	 */
	public LinkedBinaryTree<T> deleteLeftNode(TreeNode<T> curr) {
		return null;
	}

	/**
	 * 删除指定结点的右结点
	 * @param node 指定的结点
	 * @return
	 */
	public LinkedBinaryTree<T> deleteRightNode(TreeNode<T> curr) {
		return null;
	}

	@Override
	public void display() {
		// TODO Auto-generated method stub
		
	}

}
