package com.mastery.webapp.controller;

import java.io.IOException;

import javax.annotation.Resource;
import javax.servlet.http.HttpServletRequest;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.web.bind.annotation.RequestMapping;

import com.mastery.model.User;
import com.mastery.service.IUserService;
import com.mastery.webapp.SessionUtils;

@Controller
public class LoginController extends BaseController{

	private final Logger logger = LoggerFactory.getLogger(getClass());
	
	@Resource
	private IUserService userService;
	
	@RequestMapping("/login/login")
	public String show( ModelMap map) {
		return "/login";
	}
	
	@RequestMapping("/login/doLogin")
	public String doLogin(User user , HttpServletRequest request, ModelMap map) throws IOException {
		User newUser = userService.login(user);
		logger.info("user is {} , new User is {}" , user , newUser);
		if(newUser == null) {
			logger.info("error用户名或密码错误");
			map.put("invalidMsg", "用户名或密码错误");
			return "/login";
		}
		// 构造一个新的session
		SessionUtils.setUser(request, newUser);
		return "redirect:/index/index.action";
	}
	
	@RequestMapping("/login/logout")
	public String logout( HttpServletRequest request) {
		request.getSession().invalidate();
		return "/login";
	}
}
