SELECT ENV_ID, ENV_NAME, ENV_DESCRIPTION FROM ENVIRONMENT WHERE CREATOR_ID = 5; --Substitute creator id for cookie global of current user (For profile page)

SELECT P.PACKAGE_NAME, P.PACKAGE_DESCRIPTION
	FROM PACKAGE P JOIN PACKAGE_ENV_RELATION PE
		ON (P.PACKAGE_ID = PE.PACKAGE_ID)
	WHERE PE.ENV_ID = 2;	--Environments found above


-- Make sure to store this query and use env_id as param to get package list
