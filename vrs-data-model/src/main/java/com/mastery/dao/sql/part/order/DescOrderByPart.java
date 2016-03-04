/**
 * 
 */
package com.mastery.dao.sql.part.order;

import com.mastery.dao.sql.SqlConstant;
import com.mastery.dao.sql.SqlTools;

/**
 * 降序条件
 * 
 * @author zhumingyuan
 * 
 */
public class DescOrderByPart extends AbstractOrderByPart {

    public DescOrderByPart(String... columns) {
        super(columns);
    }

    /*
     * (non-Javadoc)
     * 
     * @see com.letv.mms.core.mybatis.builder.ISqlPart#getPart()
     */
    @Override
    public String getPart() {
        StringBuilder sb = new StringBuilder();
        // split by comma
        SqlTools.appendArraySplitByComma(sb, columns);
        sb.append(SqlConstant.DESC);
        return sb.toString();
    }


}
