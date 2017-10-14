package binarytreeprj;

/**
 *
 * @author ec1401916
 */

//declare binary tree node structure
public class BinaryTree 
{
    private Node root;
    
    private static class Node
    {
        Node left;
        Node right;
        //this is atomic number:
        int data;
        String a_abbrv = null;
        String a_name = null;
        
        Node(int AN, String Abbrv, String Name)
        {
            left = null;
            right = null;
            data = AN;
            a_abbrv = Abbrv;
            a_name = Name;     
        }
    }

//create new binary tree root
public void BinaryTree()
{
    root = null;
}

//look for element abbreviation in the tree:
public boolean search(String atom_letter)
{
    return (search_priv(root, atom_letter));
}


private boolean search_priv (Node root, String inString)
{
    boolean result;
    //there no tree or root element is null:
    
    if(root==null)
    {
        System.out.println("Tree doesn't exist!");
        result = false;
        return result;
    }
    
    else
    {
        if (root.a_abbrv.equalsIgnoreCase(inString)==true) 
        {
            System.out.println("Atomic number:" + root.data + " Abbreviation: " +root.a_abbrv+" Element name: "+root.a_name);
            result = true;
            return result;
        }
        if(root.left!=null)
        {
            boolean search_l = search_priv(root.left, inString);
            if (search_l==true){return result=true;}
        }
        if(root.right!=null)
        {
            boolean search_r = search_priv(root.right, inString);
            if (search_r==true){return result=true;}
        }
    }
    
    result = false; 
    return result;
    
}


//insert new node element
public void NodeInsert(int AN, String Abbrv, String Name)
{
    root = insert(root, AN, Abbrv, Name);
}

private Node insert(Node node, int AN, String Abbrv, String Name)
{
    if (node==null)
    {
        node = new Node(AN, Abbrv, Name);
    }
    else
    {
        if(AN<=node.data)
        {
            node.left = insert(node.left, AN, Abbrv, Name);
        }
        else
        {
            node.right = insert(node.right, AN, Abbrv, Name);
        }
    }
    return (node);
}


//display tree elements inorder
public void inorder()
{
    inorder(root);
    System.out.println();
}

private void inorder(Node node)
{
    if(node!=null)
    {
        inorder(node.left);
        System.out.println(node.data+" "+node.a_abbrv+" "+node.a_name);
        inorder(node.right);
    }
}

//display tree elements preorder
public void preorder()
{
    preorder(root);
    System.out.println();
}

private void preorder(Node node)
{
    if(node!=null)
    {
       System.out.println(node.data+" "+node.a_abbrv+" "+node.a_name);
       preorder(node.left);
       preorder(node.right);
    }
}

//display tree elements postorder
public void postorder()
{
    postorder(root);
    System.out.println();
}

private void postorder(Node node)
{
    if(node!=null)
    {
        postorder(node.left);
        postorder(node.right);
        System.out.println(node.data+" "+node.a_abbrv+" "+node.a_name);
    }
}


//build the initial tree here:
public void buildTree()
{
    root = insert(root, 1, "H", "Hydrogen");
    root = insert(root, 3, "Li", "Lithium");
    root = insert(root, 5, "B", "Boron");
    root = insert(root, 6, "C", "Carbon");
    root = insert(root, 7, "N", "Nitrogen");
    root = insert(root, 8, "O", "Oxygen");
    root = insert(root, 12, "Mg", "Magnesium");
    root = insert(root, 14, "Si", "Silicon");
    root = insert(root, 16, "S", "Sulphur");
    root = insert(root, 17, "Cl", "Chlorine");
    root = insert(root, 35, "Br", "Bromine");
    root = insert(root, 81, "Tl", "Thalium");
    root = insert(root, 79, "Au", "Gold");
    root = insert(root, 92, "U", "Uranium");
    root = insert(root, 20, "Ca", "Calcium");
    root = insert(root, 32, "Ge", "Germanium");
    root = insert(root, 15, "P", "Phosphorus");
    root = insert(root, 18, "Ar", "Argon");
    root = insert(root, 36, "Kr", "Krypton");
}

//get tree size
public int GetSize()
{
    return(size(root));
}

private int size(Node node)
{
    if(node==null)return(0);
    else
    {
        return(size(node.left)+1+size(node.right));
    }
}

//get max depth of the tree from root to leaf:
public int GetMaxDepth()
{
    return(maxDepth(root));
}

private int maxDepth(Node node)
{
    if(node==null)
    {
        return (0);
    }
    else
    {
        int lDepth = maxDepth(node.left);
        int rDepth = maxDepth(node.right);
        return (Math.max(lDepth, rDepth)+1);
    }
}
}