package datastructure.linear.linked;

import static org.junit.Assert.*;

import org.junit.Test;

import datastructure.exception.StructureException;
import datastructure.linear.List;
import datastructure.linear.linked.SingleLinkedList;

public class SingleLinkedListTest {

	@Test
	public void testSingleLinkedList() throws StructureException {
		List<Integer> list = new SingleLinkedList<Integer>();
		for(int i = 0 ; i < 10 ; i ++) {
			list.insert(i, i+1);
		}
		list.delete(0);
		for(int i = 0 ; i < list.size() ; i++) {
			System.out.print(list.get(i) + "   ");
		}
	}

	@Test
	public void testIndexNodeToCurrent() {
		fail("尚未实现");
	}

	@Test
	public void testInsert() {
		fail("尚未实现");
	}

	@Test
	public void testDelete() {
		fail("尚未实现");
	}

	@Test
	public void testGet() {
		fail("尚未实现");
	}

}
