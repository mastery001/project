package com.mastery.webapp.controller.channel;

import java.util.List;

import javax.annotation.Resource;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.ResponseBody;
import org.springframework.web.servlet.ModelAndView;

import com.mastery.common.Constant;
import com.mastery.webapp.CallbackType;
import com.mastery.webapp.controller.BaseContorller;
import com.mastery.webapp.controller.result.DwzResultObject;
import com.mastery.webapp.service.IChannelVoService;
import com.mastery.webapp.vo.ChannelVo;

@Controller
@RequestMapping("/channel/*")
public class ChannelController extends BaseContorller {

	private final Logger logger = LoggerFactory.getLogger(getClass());

	@Resource
	private IChannelVoService channelVoService;

	@RequestMapping("/list")
	public ModelAndView toList(ChannelVo channelVo, ModelMap map) {
		List<ChannelVo> voList = channelVoService.selectByModel(channelVo);
		map.put("voList", voList);
		setPage(channelVo, map);
		return new ModelAndView("/channel/list", map);
	}


	@RequestMapping("/toEdit")
	public ModelAndView toEdit(ChannelVo channelVo, ModelMap map) {
		if (channelVo != null && channelVo.getId() != null) {
			ChannelVo vo = channelVoService.selectById(channelVo.getId());
			map.put("vo", vo);
		}
		return new ModelAndView("/channel/edit", map);
	}
	
	@RequestMapping("/edit")
	@ResponseBody
	public DwzResultObject doEdit(ChannelVo channelVo) {
		channelVoService.update(channelVo);
		DwzResultObject dwz = new DwzResultObject();
		dwz.setForwardUrl("../channel/list.action");
		dwz.setCallbackType(CallbackType.REDIRECT.getValue());
		dwz.setForwardTitle("频道管理");
		return dwz;
	}
	
	@RequestMapping("/delete")
	@ResponseBody
	public DwzResultObject doRemove(ChannelVo channelVo) {
		DwzResultObject dwz = new DwzResultObject();
		String result = Constant.SUCCESS;
		if (channelVo.getId() == null) {
			logger.error("属性id为空!");
			result = "请选择删除内容！";
		}else {
			channelVoService.delete(channelVo);
		}
		dwz.setMessage(result);
		return dwz;
	}
}
