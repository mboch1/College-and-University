/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package binarytree;

/**
 *
 * @author ec1401916
 */
public class BinaryTree 
    {
        private class Node
            {
                char value; // Value stored in node
                Node left, right; // Left and right child
/**
Constructor for leaf nodes.
@param val The value to initialize the node.
*/
Node(char val)
{
value = val;
left = null;
right = null;
}
/**
Constructor for non-leaf nodes.
@param val The value to initialize the node.
@param leftChild The link to the left child.
@param rightChild The link to the right child.
*/
Node(char val, Node leftChild, Node rightChild)
{
value = val;
left = leftChild;
right = rightChild;
}
}
private Node root; // Root of binary tree
// Constructor.
public BinaryTree()
{
Node aNode = new Node('A');
aNode.left = new Node('B');
Node dNode = new Node('D');
Node cNode = new Node('C', dNode, null);
aNode.right = cNode;
root = aNode;
}

/**
This private inorder method recursively
traverses a binary tree in inorder.
@param btree The root of the tree to traverse.
*/
private void inorder(Node btree)
{
    if (btree != null)
        {
            inorder(btree.left);
            System.out.print(btree.value + " ");
            inorder(btree.right);
        }
}
/**
This inorder method is the public interface to
the private inorder method. It calls the private
inorder method and passes it the root of the tree.
*/
public void inorder()
    {
        inorder(root);
    }

/**
The main method creates a binary tree
and traverses it in inorder.
     * @param args
*/
public static void main(String [ ] args)
{
    BinaryTree binTree = new BinaryTree();
    System.out.print("Inorder traversal is : " );
    binTree.inorder();
    System.out.println();
}
}