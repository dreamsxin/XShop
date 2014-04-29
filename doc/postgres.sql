SET search_path TO public;

--
-- 用户表
--
CREATE TABLE users (
	id serial,
	email character varying(128) NOT NULL,
	phone character varying(20),
	password character varying(60) NOT NULL, -- 密码
	idcard character varying(18), -- 身份证
	idcardkey character varying(18), -- 身份证密钥

	fullname character varying(32), -- 真实姓名
	sex smallint DEFAULT 0, -- 性别 1 男 2 女
	age smallint, -- 年龄
	birthdate date, -- 生日

	address character varying(60), -- 所在地址
	active smallint DEFAULT 0 NOT NULL, -- 状态 0 正常 1 禁用
	verify smallint DEFAULT 0 NOT NULL, -- 验证状态 1 邮箱经过验证 2 手机经过验证 4 头像经过验证 8 身份证经过验证

	updated timestamp without time zone, -- 更新日期
	created timestamp without time zone DEFAULT now() NOT NULL, -- 创建日期

	CONSTRAINT users_id_pkey PRIMARY KEY (id),
	CONSTRAINT users_email_unique UNIQUE (email)
);
CREATE INDEX users_fullname_index ON users USING BTREE (fullname);

--
-- 日志表
--
CREATE TABLE logs (
	id serial,
	user_id integer NOT NULL,
	type smallint DEFAULT 0 NOT NULL, -- 类型 1 登录验证
	status smallint DEFAULT 0 NOT NULL, -- 状态 0 验证申请中 1 验证失败 2 验证成功

	info character varying(200), -- 日志信息

	ipaddress inet, -- ip地址
	created timestamp without time zone DEFAULT now() NOT NULL, -- 创建日期

	CONSTRAINT logs_id_pkey PRIMARY KEY (id),
	CONSTRAINT logs_user_id_fkey FOREIGN KEY (user_id) REFERENCES users(id) MATCH SIMPLE ON UPDATE RESTRICT ON DELETE CASCADE
);

--
-- 认证申请表
--
CREATE TABLE verifies (
	id serial,
	user_id integer NOT NULL,
	type smallint DEFAULT 0 NOT NULL,	-- 类型 1 邮箱 2 手机 4 头像 8 身份证
	status smallint DEFAULT 0 NOT NULL,	-- 状态 0 验证申请中 1 验证失败 2 验证成功

	ipaddress inet,				-- ip地址
	updated timestamp without time zone,	-- 更新日期
	created timestamp without time zone DEFAULT now() NOT NULL, -- 创建日期

	CONSTRAINT verifies_id_pkey PRIMARY KEY (id),
	CONSTRAINT verifies_unique UNIQUE (user_id, type),
	CONSTRAINT verifies_user_id_fkey FOREIGN KEY (user_id) REFERENCES users(id) MATCH SIMPLE ON UPDATE RESTRICT ON DELETE CASCADE
);

--
-- 用户订单
--
DROP TABLE IF EXISTS orders CASCADE;
CREATE TABLE orders (
	id serial,
	user_id integer NOT NULL,		-- 用户ID
	type smallint DEFAULT 0 NOT NULL,	-- 类型

	money numeric(12, 2),			-- 总金额
	status smallint DEFAULT 0,		-- 状态 0 等待付款 1 等待发货 2 等待确认付款 3 完成

	updated timestamp without time zone,	-- 更新时间
	created timestamp without time zone DEFAULT now() NOT NULL, -- 创建时间

	CONSTRAINT orders_id_pkey PRIMARY KEY (id),
	CONSTRAINT orders_user_id_fkey FOREIGN KEY (user_id) REFERENCES users(id) MATCH SIMPLE ON UPDATE RESTRICT ON DELETE CASCADE
);

--
-- 用户订单商品表
--
DROP TABLE IF EXISTS order_goods CASCADE;
CREATE TABLE order_goods (
	id serial,
	user_id integer NOT NULL,		-- 用户ID
	order_id integer NOT NULL,		-- 订单ID

	good_id integer NOT NULL,		-- 商品ID
	amount integer DEFAULT 0 NOT NULL,	-- 商品数量
	money numeric(10, 2) NOT NULL,		-- 商品金额

	updated timestamp without time zone,	-- 更新时间
	created timestamp without time zone DEFAULT now() NOT NULL, -- 创建时间

	CONSTRAINT order_goods_id_pkey PRIMARY KEY (id),
	CONSTRAINT order_goods_user_id_fkey FOREIGN KEY (user_id) REFERENCES users(id) MATCH SIMPLE ON UPDATE RESTRICT ON DELETE CASCADE,
	CONSTRAINT order_goods_order_id_fkey FOREIGN KEY (order_id) REFERENCES orders(id) MATCH SIMPLE ON UPDATE RESTRICT ON DELETE CASCADE
);
