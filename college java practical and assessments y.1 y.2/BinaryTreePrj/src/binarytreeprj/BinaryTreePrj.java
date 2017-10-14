/*
this is binary search tree for Chemical Elements
Created by Michal Bochenek EC1401916 on 06/06/2016
it contains options such as: add element, find element, print tree in 3 orders (in,pre and post)
*/
package binarytreeprj;

import java.util.Scanner;

public class BinaryTreePrj 
{


    public static void main(String[] args)
    {
        //this will start the menu, dont assign 6 :P
        int option=0;
        
        BinaryTree bt = new BinaryTree();
        
        
        //create initial element root tree:
        bt.buildTree();
        
        while(option!=6)
        {
        System.out.println("*******Binary Search Tree MENU*******");
        System.out.println("Please choose an option: ");
        System.out.println("Option 1: Display elements in order");
        System.out.println("Option 2: Display elements pre order");
        System.out.println("Option 3: Display elements post order");
        System.out.println("Option 4: Add an element");
        System.out.println("Option 5: Find an element");
        System.out.println("Option 6: EXIT");
        System.out.println("*************************************");
        
        //wait for user input
        Scanner sc = new Scanner(System.in);
        option=sc.nextInt();

            if(option==1)
            {
                bt.inorder();
                System.out.println("Number of nodes in the current tree" +bt.GetSize());
                System.out.println("Max height of the current tree "+bt.GetMaxDepth());
                System.out.println("");
            }
            
            if(option==2)
            {
                bt.preorder();
                System.out.println("Number of nodes in the current tree" +bt.GetSize());
                System.out.println("Max height of the current tree "+bt.GetMaxDepth());
                System.out.println("");
            }
            
            if(option==3)
            {
                bt.postorder();
                System.out.println("Number of nodes in the current tree" +bt.GetSize());
                System.out.println("Max height of the current tree "+bt.GetMaxDepth());
                System.out.println("");
            }
            
            if(option==4)//add an element
            {
                System.out.println("Building node...");
                
                System.out.println("Please state Atomic number: ");
                int AN = sc.nextInt();
                
                Scanner sc2 = new Scanner(System.in);
                System.out.println("State the element abbreviation: ");
                String Abbrv = sc2.nextLine();
                
                Scanner sc3 = new Scanner(System.in);
                System.out.println("State the element name: ");
                String Name = sc3.nextLine();
                
                bt.NodeInsert(AN, Abbrv, Name);
                System.out.println("");

            }
            
            if(option==5)//find an element
            {
                System.out.println("Please type the abbreviation of the element:");
                
                Scanner sc4 = new Scanner(System.in);
                String abbreviation = sc4.nextLine();
                //check if it exists and display result if yes or msg if not:
                if(bt.search(abbreviation)==false)
                {
                    System.out.println("No such element was found!");
                    System.out.println("");
                }
            }
        }

    }
    
}
